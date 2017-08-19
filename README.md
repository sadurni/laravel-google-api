[![Latest Stable Version](https://poser.pugx.org/mrjonleek/laravel-google-api/v/stable)](https://packagist.org/packages/mrjonleek/laravel-google-api)
[![License](https://poser.pugx.org/mrjonleek/laravel-google-api/license)](https://packagist.org/packages/mrjonleek/laravel-google-api)

# Google Places API.

A **[Laravel/Lumen](https://laravel.com/docs/5.4)** package for working with **Google API Web Services**.

### The following place requests are available:
* [Place Search](#place-search) return a list of places based on a user's location or search string.
* [Place Details](#place-details) requests return more detailed information about a specific Place, including user reviews.
* [Place Autocomplete](#place-autocomplete) can be used to automatically fill in the name and/or address of a place as you type.
* [Query Autocomplete](#query-autocomplete) can be used to provide a query prediction service for text-based geographic searches, by returning suggested queries as you type.
* [Place Add](#place-add) can be used to add a place to Google's Place database

# Installation
Install it with composer
```
composer require mrjonleek/laravel-google-api
```



# Usage
## Step 1
Set up the service provider and facade in the **config\app.php**
```php

'providers' => [
....
....
Mrjonleek\GoogleApi\Providers\PlacesServiceProvider::class,
];

'aliases' => [
....
....
'GooglePlaces' => Mrjonleek\GoogleApi\Facades\Places::class,
];

```

## Step 2
publish the config file with following artisan command
```
php artisan vendor:publish --provider="Mrjonleek\GoogleApi\Providers\PlacesServiceProvider"
```

This will create **google.php** file in the config directory.

Set the *API KEY* in this config file or in `.env` as **GOOGLE_API_KEY**.

## Set 3
Start using the package using Facade.

```
$response = GooglePlaces::placeAutocomplete('some city');
```

---
# Response
The response returned is a [Laravel's Collection](https://laravel.com/docs/5.2/collections) so that you can perform any of the available collection methods on it.

# Available Methods

<a name=place-search></a>
## Place Search
### nearbySearch($location, $radius = null, $params = [])
* `location` — The latitude/longitude around which to retrieve place information. This must be specified as latitude, longitude.
* 'radius' — Defines the distance (in meters) within which to return place results. The maximum allowed radius is 50 000 meters. Note that `radius` must not be included if `rankby=distance` (described under **Optional parameters** below) is specified.
* If `rankby=distance` (described under **Optional parameters** below) is specified, then one or more of `keyword`, `name`, or `types` is required.
* `params` - **Optional Parameters** You can refer all the available optional parameters on the [Google's Official Webpage](https://developers.google.com/places/web-service/search)

### textSearch($query, $params = [])
* `query` — The text string on which to search, for example: "restaurant". The Google Places service will return candidate matches based on this string and order the results based on their perceived relevance.
* `params` - **Optional Parameters** You can refer all the available optional parameters on the [Google's Official Webpage](https://developers.google.com/places/web-service/search)

### radarSearch($location, $radius, array $params)
* `location` — The latitude/longitude around which to retrieve place information. This must be specified as latitude, longitude.
* `radius` — Defines the distance (in meters) within which to return place results. The maximum allowed radius is 50 000 meters.
* `params` - **Optional Parameters** You can refer all the available optional parameters on the [Google's Official Webpage](https://developers.google.com/places/web-service/search)

**Note:** A Radar Search request must include at least one of `keyword`, `name`, or `types`.

---

<a name=place-details></a>
# Place Details
### placeDetails($placeId, $params = [])
* `placeId` — A textual identifier that uniquely identifies a place, returned from a Place Search.
* `params` - **Optional Parameters** You can refer all the available optional parameters on the [Google's Official Webpage](https://developers.google.com/places/web-service/details)

---

<a name=place-autocomplete></a>
# Place Autocomplete
### placeAutocomplete($input, $params = [])
* `input` — The text string on which to search. The Place Autocomplete service will return candidate matches based on this string and order results based on their perceived relevance.
* `params` - **Optional Parameters** You can refer all the available optional parameters on the [Google's Official Webpage](https://developers.google.com/places/web-service/autocomplete)

---

<a name=query-autocomplete></a>
# Query Autocomplete
### queryAutocomplete($input, $params = [])
* `input` — The text string on which to search. The Places service will return candidate matches based on this string and order results based on their perceived relevance.
* `params` - **Optional Parameters** You can refer all the available optional parameters on the [Google's Official Webpage](https://developers.google.com/places/web-service/query)

<a name=place-add></a>
# Place Add
### addPlace($params)
* `params` - The set of key-value parameters necessary to add a place to Google. You can refer to the fields on [Google's Official Webpage regarding Place Add](https://developers.google.com/places/web-service/add-place)

# Additional Methods
### getStatus()
This will return the status of the response send by google api. Use it after making any request.

### getKey()
This will return the `API KEY` been used with the requests.

### setKey($key)
This will set the `API KEY`.

# Contribution
Feel free to report issues or make Pull Requests.
If you find this document can be improved in any way, please feel free to open an issue for it.

# License

The Google Places Api is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)