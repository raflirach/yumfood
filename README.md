# yumfood API DOCUMENTATION

## _Endpoint_
- `GET /api/vi/vendors`
- `GET /api/vi/vendors/{id}`
- `POST /api/vi/vendors`
- `PUT /api/vi/vendors/{id}`
- `DELETE /api/vi/vendors/{id}`
- `GET /api/vi/vendors/{id}/dishes`
- `GET /api/vi/dishes`
- `GET /api/vi/dishes/{id}`
- `GET /api/vi/orders`
- `POST /api/vi/orders`

**Show list vendor**
----

* **URL**

  /api/vi/vendors

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": [
        {
            "id": 1,
            "name": "Waelchi and Sons",
            "logo": "https://lorempixel.com/640/480/food/?69014",
            "tags": [
                {
                    "id": 1,
                    "name": "chinese"
                },

                ...
            ],
            "dishes": "http://127.0.0.1:8000/api/v1/vendors/1/dishes"
        },

        ...
    ]
  }
  ```
  <br>

**Show vendor by id**
----
* **URL**

  /api/vi/vendors/{id}

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": {
        "id": 10,
        "name": "Osinski, Lehner and Gorczany",
        "logo": "https://lorempixel.com/640/480/food/?45700",
        "tags": [
            {
                "id": 1,
                "name": "chinese"
            },

            ...
        ],
        "dishes": "http://127.0.0.1:8000/api/v1/vendors/10/dishes"
    }
  }
  ```
  <br/>

**Create Vendor**
----
* **URL**

  /api/vi/vendors

* **Method**

  `POST`

* **Request body**

  ```
  {
    "name": "Rai Raka Restauran",
    "logo": "https://lorempixel.com/640/480/food/?69014",
    "tags": ["indonesian", "fish"]
  }
  ```

* **Success Response:** <br />
  **Code:** 201 <br />
  **Content:**
  ```
  {
    "data": {
        "id": 52,
        "name": "Rai Raka Restauran",
        "logo": "https://lorempixel.com/640/480/food/?69014",
        "tags": [
            {
                "id": 4,
                "name": "indonesian"
            },
            {
                "id": 10,
                "name": "fish"
            }
        ],
        "dishes": "http://127.0.0.1:8000/api/v1/vendors/52/dishes"
    }
  }
  ```

* **Failed Response:** <br />
  **Code:** 422 <br />
  **Content:**
  ```
  {
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "logo": [
            "The logo field is required."
        ],
        "tags": [
            "The tags must be an array."
        ]
    }
  }
  ```
  <br />

**Edit Vendor**
----
* **URL**

  /api/vi/vendors/{id}

* **Method**

  `PUT`

* **Request body**

  ```
  {
    "name": "Rai Raka Restauran Edit",
    "logo": "https://lorempixel.com/640/480/food/?69014",
    "tags": ["western", "meat"]
  }
  ```

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": {
        "id": 52,
        "name": "Rai Raka Restauran Edit",
        "logo": "https://lorempixel.com/640/480/food/?69014",
        "tags": [
            {
                "id": 2,
                "name": "western"
            },
            {
                "id": 11,
                "name": "meat"
            }
        ],
        "dishes": "http://127.0.0.1:8000/api/v1/vendors/52/dishes"
    }
  }
  ```

* **Failed Response:** <br />
  **Code:** 422 <br />
  **Content:**
  ```
  {
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "logo": [
            "The logo field is required."
        ],
        "tags": [
            "The tags must be an array."
        ]
    }
  }
  ```
  **Code:** 404 <br />
  **Content:**
  ```
  {
    "status": "error",
    "code": 404,
    "message": "Data not found"
  }
  ```
  <br />

**Delete Vendor**
----
* **URL**

  /api/vi/vendors/{id}

* **Method**

  `DELETE`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "message": "Vendor deleted successfully"
  }
  ```

* **Failed Response:** <br />
  **Code:** 404 <br />
  **Content:**
  ```
  {
    "status": "error",
    "code": 404,
    "message": "Data not found"
  }
  ```
  <br />

**Show vendor dishes**
----

* **URL**

  /api/vi/vendors/{id}/dishes

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": [
        {
            "id": 27,
            "name": "Bacon Cheese Dog",
            "price": "23",
            "vendor": {
                "id": 1,
                "name": "Waelchi and Sons",
                "logo": "https://lorempixel.com/640/480/food/?69014",
                "created_at": "2021-03-11 22:23:22",
                "updated_at": "2021-03-11 22:23:22"
            }
        },
        {
            "id": 77,
            "name": "Little Bacon Burger",
            "price": "25",
            "vendor": {
                "id": 1,
                "name": "Waelchi and Sons",
                "logo": "https://lorempixel.com/640/480/food/?69014",
                "created_at": "2021-03-11 22:23:22",
                "updated_at": "2021-03-11 22:23:22"
            }
        },
        
        ...
    ]
  }
  ```
  <br>

**Show list dish**
----

* **URL**

  /api/vi/dishes

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": [
        {
            "id": 1,
            "name": "Bacon Cheese Dog",
            "price": "5",
            "vendor": {
                "id": 7,
                "name": "Kuvalis-Huels",
                "logo": "https://lorempixel.com/640/480/food/?81006",
                "created_at": "2021-03-11 22:23:23",
                "updated_at": "2021-03-11 22:23:23"
            }
        },
        {
            "id": 2,
            "name": "Cheese Veggie Sandwich",
            "price": "43",
            "vendor": {
                "id": 11,
                "name": "Weissnat Group",
                "logo": "https://lorempixel.com/640/480/food/?55386",
                "created_at": "2021-03-11 22:23:23",
                "updated_at": "2021-03-11 22:23:23"
            }
        },
        
        ...
    ]
  }
  ```
  <br>

**Show dish by id**
----

* **URL**

  /api/vi/dishes/{id}

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": {
        "id": 11,
        "name": "Little Cheeseburger",
        "price": "31",
        "vendor": {
            "id": 7,
            "name": "Kuvalis-Huels",
            "logo": "https://lorempixel.com/640/480/food/?81006",
            "created_at": "2021-03-11 22:23:23",
            "updated_at": "2021-03-11 22:23:23"
        }
    }
  }
  ```
  <br>

**Show list order**
----

* **URL**

  /api/vi/orders

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": [
        {
            "id": 1,
            "quantity": 3,
            "status": false,
            "total_price": 30,
            "user": {
                "id": 1,
                "name": "Mrs. Jessika Daniel",
                "email": "murphy.dickinson@example.com",
                "email_verified_at": "2021-03-11 22:23:24",
                "created_at": "2021-03-11 22:23:24",
                "updated_at": "2021-03-11 22:23:24"
            },
            "dish": {
                "id": 3,
                "vendor_id": 35,
                "name": "Grilled Cheese",
                "price": "10",
                "created_at": "2021-03-11 22:23:24",
                "updated_at": "2021-03-11 22:23:24"
            }
        },
        
        ...
    ]
  }
  ```
  <br>

**Create Order**
----
* **URL**

  /api/vi/orders

* **Method**

  `POST`

* **Request body**

  ```
  {
    "user_id": 10,
    "dish_id": 8,
    "quantity": 2
  }
  ```

* **Success Response:** <br />
  **Code:** 201 <br />
  **Content:**
  ```
  {
    "data": {
        "id": 16,
        "quantity": 2,
        "status": false,
        "total_price": 98,
        "user": {
            "id": 10,
            "name": "Noemy Gutkowski",
            "email": "kuhlman.darwin@example.org",
            "email_verified_at": "2021-03-11 22:23:24",
            "created_at": "2021-03-11 22:23:24",
            "updated_at": "2021-03-11 22:23:24"
        },
        "dish": {
            "id": 8,
            "vendor_id": 6,
            "name": "Bacon Cheeseburger",
            "price": "49",
            "created_at": "2021-03-11 22:23:24",
            "updated_at": "2021-03-11 22:23:24"
        }
    }
  }
  ```

* **Failed Response:** <br />
  **Code:** 422 <br />
  **Content:**
  ```
  {
    "message": "The given data was invalid.",
    "errors": {
        "user_id": [
            "The user id field is required."
        ],
        "dish_id": [
            "The dish id field is required."
        ],
        "quantity": [
            "The quantity must be an integer."
        ]
    }
  }
  ```
  <br />

**Show filtered vendor**
----

* **URL**

  /api/vi/vendors?tags[]={tag}

* **Method**

  `GET`

* **Success Response:** <br />
  **Code:** 200 <br />
  **Content:**
  ```
  {
    "data": [
        {
            "id": 1,
            "name": "Waelchi and Sons",
            "logo": "https://lorempixel.com/640/480/food/?69014",
            "tags": [
                {
                    "id": 1,
                    "name": "chinese"
                },

                ...
            ],
            "dishes": "http://127.0.0.1:8000/api/v1/vendors/1/dishes"
        },

        ...
    ]
  }
  ```
  <br>