Documentation
Show Package
Returns json of package data.

URL

/package

Method:

GET

URL Params

None

Data Params

None

Success Response:

{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Package Loaded!"
    },
    "data": {
        "package": [
            {
                "_id": "5ff72eff4f320000d7004a42",
                "customer_name": "Roger Federer",
                "customer_address": "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email": "roger@nara.com",
                "customer_phone": "081928177111",
                "customer_address_detail": "Samping Rumah",
                "customer_zip_code": "PZ1928",
                "zone_code": "CK17B",
                "updated_at": "2021-01-07T16:49:33.697000Z",
                "created_at": "2021-01-07T15:55:43.177000Z"
            }
            {
                "_id": "5ff72fc44f320000d7004a44",
                "customer_name": "Rafael Nadal",
                "customer_address": "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email": "nara@nara.com",
                "customer_phone": "081928177111",
                "customer_address_detail": "address details",
                "customer_zip_code": "PZ1928",
                "zone_code": "CK17B",
                "updated_at": "2021-01-07T15:59:00.170000Z",
                "created_at": "2021-01-07T15:59:00.170000Z"
            },
            {
                "_id": "5ff72fef4f320000d7004a45",
                "customer_name": "Djokovic",
                "customer_address": "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email": "nara@nara.com",
                "customer_phone": "081928177111",
                "customer_address_detail": "address details",
                "customer_zip_code": "PZ1928",
                "zone_code": "CK17B",
                "updated_at": "2021-01-07T15:59:43.395000Z",
                "created_at": "2021-01-07T15:59:43.395000Z"
            }
        ]
    }
}
```json
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ error : error }`

* **Sample Call:**

  ```javascript
  axios.get('url/package')
Insert Package
Insert json package data to database.

URL

/package

Method:

POST

URL Params

None

Data Params

'customer_name' => 'required|max:255', 'customer_address' => 'required|max:255', 'customer_email' => 'required|max:255|email|unique:packages', 'customer_phone' => 'required|max:255|min:12', 'customer_address_detail' => 'required|max:255', 'customer_zip_code' => 'required|max:255', 'zone_code' => 'required|max:255'

Success Response:

{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Package Inserted!"
    },
    "data": {
        "package": {
            "_id": "5ff73cc84f320000d7004a47",
            "customer_name": "Serena Williams",
            "customer_address": "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
            "customer_email": "serena@nara.com",
            "customer_phone": "081928177111",
            "customer_address_detail": "address details",
            "customer_zip_code": "PZ1928",
            "zone_code": "CK17B",
            "updated_at": "2021-01-07T16:54:32.685000Z",
            "created_at": "2021-01-07T16:54:32.685000Z"
        }
    }
}
Error Response:
{
    "meta": {
        "code": 401,
        "status": "error",
        "message": "Validation error"
    },
    "data": {
        "error": {
            "customer_email": [
                "The customer email has already been taken."
            ]
        }
    }
}
Sample Call:

axios.post('/package', {
  customer_name : package.customer_name,
  customer_address : package.customer_address,
  customer_email : package.customer_email,
  customer_phone : package.customer_phone,
  customer_address_detail : package.customer_address_detail,
  customer_zip_code : package.customer_zip_code,
  zone_code : package.zone_code
})
.then(function (response) {
  console.log(response);
})
.catch(function (error) {
  console.log(error);
});
Update Package
Insert json package data to database.

URL

/package/{package}

Method:

PUT | PATCH

URL Params

id

Data Params

'customer_name' => 'required|max:255', 'customer_address' => 'required|max:255', 'customer_email' => 'required|max:255|email|unique:packages', 'customer_phone' => 'required|max:255|min:12', 'customer_address_detail' => 'required|max:255', 'customer_zip_code' => 'required|max:255', 'zone_code' => 'required|max:255'

Success Response:

{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Package Updated!"
    },
    "data": {
        "package": [
            {
                "_id": "5ff72eff4f320000d7004a42",
                "customer_name": "Roger Federer",
                "customer_address": "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email": "roger@nara.com",
                "customer_phone": "081928177111",
                "customer_address_detail": "Samping Rumah",
                "customer_zip_code": "PZ1928",
                "zone_code": "CK17B",
                "updated_at": "2021-01-07T16:49:33.697000Z",
                "created_at": "2021-01-07T15:55:43.177000Z"
            }
        ]
    }
}
Error Response:
{
    "meta": {
        "code": 401,
        "status": "error",
        "message": "Validation error"
    },
    "data": {
        "error": {
            "customer_email": [
                "The customer email has already been taken."
            ],
            "customer_phone": [
                "The customer phone must be at least 12 characters."
            ]
        }
    }
}
Sample Call:

//PUT
axios.put(`url/package/${data.packageID}`, {
  customer_name : package.customer_name,
  customer_address : package.customer_address,
  customer_email : package.customer_email,
  customer_phone : package.customer_phone,
  customer_address_detail : package.customer_address_detail,
  customer_zip_code : package.customer_zip_code,
  zone_code : package.zone_code
})
.then(function (response) {
  console.log(response);
})
.catch(function (error) {
  console.log(error);
});

 axios.patch(`url/package/${data.packageID}`, {
  zone_code : package.zone_code
})
.then(function (response) {
  console.log(response);
})
.catch(function (error) {
  console.log(error);
});
Delete Package
Soft deleting package data.

URL

/package/{package}

Method:

DELETE

URL Params

id

Data Params

None

Success Response:

{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Package Deleted!"
    },
    "data": {
        "package": {
            "_id": "5ff730444f320000d7004a46",
            "customer_name": "Djokovic",
            "customer_address": "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
            "customer_email": "djokovic@nara.com",
            "customer_phone": "081928177111",
            "customer_address_detail": "address details",
            "customer_zip_code": "PZ1928",
            "zone_code": "CK17B",
            "updated_at": "2021-01-07T16:55:40.436000Z",
            "created_at": "2021-01-07T16:01:08.938000Z",
            "deleted_at": "2021-01-07T16:55:40.436000Z"
        }
    }
}
Error Response:
{ "meta": { "code": 401, "status": "error", "message": "Package delete error" }, "data": { "error": "Data not found" } }

Sample Call:

axios.delete(`/package/${data.packageID}`)
