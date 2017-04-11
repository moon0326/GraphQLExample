# Query

Run the following query to test the changes

```js
{
  Creative(id: 1) {
    id
  }
}
```

We should get just one Creative.

```js
{
  "data": {
    "Creative": [
      {
        "id": "1"
      }
    ]
  }
}
```

Let's select more fields. Checkout ```git checkout step5-selective-query``` branch.