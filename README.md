# Query

Run the following query to test the changes

```js
{
  Creative {
    id
  }
}
```

You should get two creatives for this time.

```js
{
  "data": {
    "Creative": [
      {
        "id": "1"
      },
      {
        "id": "2"
      }
    ]
  }
}
```

Let's query by creative id. Checkout ```git checkout step4-passing-argument``` branch. We will define argument for Creative object.