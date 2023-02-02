<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class ImageArirangTransformer extends TransformerAbstract {
    public function transform($data) {
        $id = $data->dataIdInfo->idCitation->resTitle;
        $source = $data->dataIdInfo->plaInsId->platfSNm . "_" . $data->dataIdInfo->plaInsId->platfSer;
        $acquired = $data->dqInfo->graphOver->brwExt->tempEle->exTemp->beginEnd->end;
        $thumbnailUrl = $data->dqInfo->graphOver->bgFileName;

        $geometry = $this->coordsToPolygonGeoJson($data->dataIdInfo->dataExt->geoEle->polygon->coordinates);

        $addInfo = $data->addInfo->locAtt;

        $transformed = [
            'id' => $id,
            'name' => $id,
            'acquired' => $acquired,
            'source' => $source,
            'source_name' => $this->itemName($source),
            'image' => [
                'thumbnail_url' => $thumbnailUrl,
                'geometry' => $geometry
            ],
            'info' => [[
                'type' => 'cloudCover',
                'name' => $this->typeName('cloudCover'),
                'value' => $data->contInfo->cloudCovePerc,
                'text' => $data->contInfo->cloudCovePerc . ' %'
            ]]
        ];

        foreach ($addInfo as $info) {
            array_push($transformed['info'], [
                'type' => $info->locName,
                'name' => $this->typeName($info->locName),
                'value' => is_numeric($info->locValue) ? number_format((double) $info->locValue, 2) : $info->locValue,
                'text' => $info->locValue
            ]);
        }

        return $transformed;
    }

    public function coordsToPolygonGeoJson ($coords) {
        $coords = explode(' ', $coords);
        $result = [];

        foreach ($coords as $c) {
            $c = explode(',', $c);
            array_push($result, [(double) $c[1], (double) $c[0]]);
        }

        return [
            'type' => 'Polygon',
            'coordinates' => [$result]
        ];
    }

    private function typeName ($type) {
        $data = [
            'cloudCover' => 'Cloud Cover',
            'offNadirAngle' => 'Off-Nadir Angle',
            'rollTiltAngle' => 'Roll Tilt Angle',
            'pitchTiltAngle' => 'Pitch Tilt Angle',
            'yawTiltAngle' => 'Yaw Tilt Angle',
            'archivingLocationName' => 'Archiving Location Name'
        ];

        return array_key_exists($type, $data) ? $data[$type] : $type;
    }

    private function itemName ($type) {
        $data = [
            'KOMPSAT_2' => 'KOMPSAT 2',
            'KOMPSAT_3' => 'KOMPSAT 3',
            'KOMPSAT_5' => 'KOMPSAT 5'
        ];

        return array_key_exists($type, $data) ? $data[$type] : $type;
    }
}
