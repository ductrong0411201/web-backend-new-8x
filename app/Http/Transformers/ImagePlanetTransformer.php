<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class ImagePlanetTransformer extends TransformerAbstract {
    public function transform($data) {
        $id = $data->id;
        $properties = $data->properties;
        $itemType = $properties->item_type;
        $acquired = $properties->acquired;
        $apiKey = env('API_PLANET_KEY', '4e91b35da31d44aa9bd47e6ed49d51f8');

        $transformed = [
            'id' => $id,
            'name' => $id,
            'acquired' => $acquired,
            'source' => $itemType,
            'source_name' => $this->itemName($itemType),
            'image' => [
                'thumbnail_url' => "https://tiles0.planet.com/v1/experimental/tiles/$itemType/$id/thumb?api_key=$apiKey",
                'tile_url' => "https://{s}.planet.com/v1/experimental/tiles/$itemType/$id/{z}/{x}/{y}.png?api_key=$apiKey",
                'subdomains' => ['tiles0', 'tiles1', 'tiles2', 'tiles3']
            ],
            'info' => []
        ];

        array_push($transformed['info'], [
            'type' => 'CLOUD_COVER',
            'name' => $this->typeName('CLOUD_COVER'),
            'value' => $properties->cloud_cover,
            'text' => $properties->cloud_cover . ' %'
        ], [
            'type' => 'GSD',
            'name' => $this->typeName('GSD'),
            'value' => $properties->gsd,
            'text' => number_format($properties->gsd, 2) . ' m'
        ], [
            'type' => 'SATELLITE_ID',
            'name' => $this->typeName('SATELLITE_ID'),
            'value' => $properties->satellite_id,
            'text' => $properties->satellite_id
        ], [
            'type' => 'SUN_AZIMUTH',
            'name' => $this->typeName('SUN_AZIMUTH'),
            'value' => $properties->sun_azimuth,
            'text' => number_format($properties->sun_azimuth, 2) . ' °'
        ], [
            'type' => 'SUN_ELEVATION',
            'name' => $this->typeName('SUN_ELEVATION'),
            'value' => $properties->sun_elevation,
            'text' => number_format($properties->sun_elevation, 2) . ' °'
        ], [
            'type' => 'OFF_NADIR_ANGLE',
            'name' => $this->typeName('OFF_NADIR_ANGLE'),
            'value' => $properties->view_angle,
            'text' => number_format($properties->view_angle, 2) . ' °'
        ]);

        return $transformed;
    }

    private function typeName ($type) {
        $data = [
            'CLOUD_COVER' => 'Cloud Cover',
            'GSD' => 'Ground Sample Distance',
            'SATELLITE_ID' => 'Satellite ID',
            'SUN_AZIMUTH' => 'Sun Azimuth',
            'SUN_ELEVATION' => 'Sun Elevation',
            'OFF_NADIR_ANGLE' => 'Off-Nadir Angle',
        ];

        return array_key_exists($type, $data) ? $data[$type] : $type;
    }

    private function itemName ($type) {
        $data = [
            'PSScene4Band' => '4-band PlanetScope scene',
            'PSScene3Band' => '3-band PlanetScope scene',
            'REScene' => 'RapidEye basic scene',
            'REOrthoTile' => 'RapidEye ortho tile',
            'Sentinel2L1C' => 'Sentinel-2 tiles',
            'PSOrthoTile' => 'PlanetScope ortho tile',
            'Landsat8L1G' => 'Landsat 8 scenes',
        ];

        return array_key_exists($type, $data) ? $data[$type] : $type;
    }
}
