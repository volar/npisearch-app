<p align="center">
  <a href="https://laravel.com" target="_blank">
      <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
  <a href="https://getbootstrap.com/">
      <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png" alt="Bootstrap logo" width="200" height="165">
  </a>
  <a href="https://livewire.laravel.com/">
      <img src="/public/livewireLogo.png" alt="Livewire logo" width="200" height="165">
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

## Accessing the app by visiting

`http://localhost`

## Api Endpoints

-   `/api/npi` - search npi registry by query params.
-               `(Requires at least one of params bellow)`
    -   firstName
    -   lastName
    -   npiNumber
    -   taxonomyDescription
    -   city
    -   state
    -   zip
    -   limit
    -   skip

## Additional Links to docs

-   [NPI Registry API DOCS](https://npiregistry.cms.hhs.gov/api-page).
-   [Details view](https://npiregistry.cms.hhs.gov/provider-view/{npi}).

## Improvements / Todo's

-   Add pagination
-   Use Cache to store the results
-   Switch to bootstrap layout
-   Add E2E/Unit/Components tests
-   Add more validation to the request
-   Limit to 1200
-   Move details to a modal and use details from response

## Refactoring

-   Change how we call the third party api
-   Change the way how we handle the data
-   Use a service layer to wrap the third party api call
-   Use a repository layer to handle the data access
-   Use a transformer to transform the data from the third party api
-   pass the request object to the service layer instead of the query params
