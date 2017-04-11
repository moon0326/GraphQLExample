# Query

Run the following query to test the changes

```js
{
  Creative {
    id
  }
}
```

You should get an empty array

```js
{
  "data": {
    "Creative": []
  }
}
```

Checkout ```step3-returning-data-for-object``` branch. We will return some data.