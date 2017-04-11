# Query

Run the following query to test the changes.

```js
{
  Creative(id: 1) {
    id,
    fqid,
    products {
      id
    }
  }
}
```

You should get the following response.

```js
{
  "data": {
    "Creative": [
      {
        "id": "1",
        "fqid": "creative.1",
        "products": [
          {
            "id": "1"
          },
          {
            "id": "2"
          }
        ]
      }
    ]
  }
}
```


