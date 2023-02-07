---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#Public Project

Api for Public Projects
<!-- START_44664d618dc284da45510e9324b6917b -->
## GET List of Public Projects

Get all public projects.

> Example request:

```bash
curl -X GET -G "http://localhost/api/public_projects" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/public_projects",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 1,
        "name_of_hospital": "Upgradation of District Hospital,Ziro,Lower Subansiri.",
        "number_of_beds": 60,
        "plinth_area": 4240,
        "unit": "sqm",
        "name_of_CE_PWD": "CZ-A (CE Hage Appa)",
        "name_of_circle": "Yachuli Circle",
        "name_of_division": "Ziro Division",
        "head_of_account": "RIDF",
        "name_of_the_firm": "SE office yachuli for scrutiny",
        "emails": {
            "AE": "nllkhtg@gmail.com",
            "JE": " kublaikhan7719@gmail.com"
        },
        "geotags": [
            {
                "local_time": "2020-11-28 13:59:47",
                "description": "AA accorded",
                "image1": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/RCv4v6delGC6msypjP4TvP4rTLrV0H3w7NBort3L.jpeg",
                "image2": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/dAC1dGS7Z0DsauJVlqggDh6ESvdVOFFOboOHomBf.jpeg",
                "image3": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/uL2Z7U1hAdYoBQi8ZemPHep19mHmmfqBgMSO2nAz.jpeg",
                "image4": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/V3lkeg3y3xCJsyXBgUZErExMMP6vNDBTiCHI7oFu.jpeg"
            }
        ]
    },
    {
        "id": 2,
        "name_of_hospital": "Upgradation of District Hospital at Aalo in West Siang District of Arunachal Pradesh.",
        "number_of_beds": 60,
        "plinth_area": 4126,
        "unit": "sqm",
        "name_of_CE_PWD": "CZ-B (CE Marker Bam)",
        "name_of_circle": "Aalo Circle",
        "name_of_division": "Aalo Division",
        "head_of_account": "RIDF",
        "name_of_the_firm": "CE office CZ-B for further action",
        "emails": {
            "EE": "dugjumlona77@gmail.com"
        },
        "geotags": [
            {
                "time": "2020-08-15 08:15:07",
                "description": "Estimate prepare vide memo no- PD\/RIDF\/01\/2018-19 dt. 10\/7\/2020 & letter no. CEAP\/CZ-B\/ RIDF\/district hospital\/ 2020-21\/1425-27 dt. 12\/8\/2020",
                "image1": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20200815\/DgoBLLU2ouQnTYb7IYwIne2HZGmE1XvZh9pjyw6T.jpeg",
                "image2": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20200815\/LgkzCIGVxNd1YNfFZR76vsivs4JVN9Ic7fYcLXQU.jpeg",
                "image3": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20200815\/LYtUDfABaMOOWkN5XOt1NDcFXrvMHNv3BitQpC2C.jpeg",
                "image4": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20200815\/M7SRls1vbkHU7wofX9IzzIHdJBpOPXo9gRErnAnO.jpeg"
            },
            {
                "time": "2020-10-31 12:28:15",
                "description": "Existing building dismentled for new construction.",
                "image1": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201031\/esyFNBoVKg4EKSC1EWlJ3VdAKmNchdHjFgWin8Gw.jpeg",
                "image2": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201031\/by8Z6fjd1k3g9GSf4kS63xFE1wpJNqz6YCEJ5BWN.jpeg",
                "image3": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201031\/iegAAzPbw9C6tjXKCzYBVZkveqIpTHe25vHJoDgl.jpeg",
                "image4": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201031\/5M12G4s1sGwzOtfwQVAZeQLSZaVUwblIiIwQwAz7.jpeg"
            }
        ]
    }
]
```

### HTTP Request
`GET /api/public_projects`


<!-- END_44664d618dc284da45510e9324b6917b -->

<!-- START_27b96e96acd800db302e05a866c9d5e9 -->
## GET Detail of Public Project

Get detail of public project.

> Example request:

```bash
curl -X GET -G "http://localhost/api/public_projects/{id}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/public_projects/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": 1,
    "name_of_hospital": "Upgradation of District Hospital,Ziro,Lower Subansiri.",
    "number_of_beds": 60,
    "plinth_area": 4240,
    "unit": "sqm",
    "name_of_CE_PWD": "CZ-A (CE Hage Appa)",
    "name_of_circle": "Yachuli Circle",
    "name_of_division": "Ziro Division",
    "head_of_account": "RIDF",
    "name_of_the_firm": "SE office yachuli for scrutiny",
    "emails": {
        "AE": "nllkhtg@gmail.com",
        "JE": " kublaikhan7719@gmail.com"
    },
    "geotags": [
        {
            "time": "2020-11-28 13:59:47",
            "description": "AA accorded",
            "image1": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/RCv4v6delGC6msypjP4TvP4rTLrV0H3w7NBort3L.jpeg",
            "image2": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/dAC1dGS7Z0DsauJVlqggDh6ESvdVOFFOboOHomBf.jpeg",
            "image3": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/uL2Z7U1hAdYoBQi8ZemPHep19mHmmfqBgMSO2nAz.jpeg",
            "image4": "https:\/\/arunachalmonitoring.com\/storage\/imagescompress\/20201128\/V3lkeg3y3xCJsyXBgUZErExMMP6vNDBTiCHI7oFu.jpeg"
        }
    ]
}
```

### HTTP Request
`GET /api/public_projects/{id}`


<!-- END_27b96e96acd800db302e05a866c9d5e9 -->


