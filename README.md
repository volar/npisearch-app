<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
<a href="https://getbootstrap.com/">
    <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png" alt="Bootstrap logo" width="200" height="165">
  </a>
</p>
# NPI Search-app

## An application that searches the npi registry and lists the results.

A user is be able to search by:

-   first name,
-   last name,
-   npi number,
-   taxonomy description,
-   city, state and zip.

The results table will only display basic information so user has the option to click the NPI number to get to details view.

## Installation

-   Clone the repo
-   cd into the project directory
-   If using docker and have docker desktop running
-   Run `./vendor/bin/sail up`

## Api Endpoints

-   `/api/npi` - search npi registry by query params.
    -   firstName (required if lastName is not provided)
    -   lastName (required if firstName is not provided)
    -   npiNumber (required if firstName and lastName are not provided)
    -   taxonomyDescription
    -   city (required if state and zip are not provided)
    -   state (required if city and zip are not provided)
    -   zip (required if city and state are not provided)
    -   limit
    -   skip

## Additional Links to docs

-   [NPI Registry API DOCS](https://npiregistry.cms.hhs.gov/api-page).
-   [Details view](https://npiregistry.cms.hhs.gov/provider-view/{npi}).
