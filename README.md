# Query

In the previous branches, we simply returned an array of Creatives and let the GraphQL select fields for us. That's fine, but we can optimize it a little bit further by requesting fields selectively.

Take a look at where we resolve Creative objects [findCreative](./src/RootObject.php). ```ResolveInfo $info``` variable has ```getFieldSelection()``` method, which returns requested fields.

Take a look at [DataSources\Creatives.php](./src/DataSources/Creatives.php). findById and findAll now have an optional argument ```$fieldsToSelect```

Two methods are using ```array_column_multi```, which is a slighly modified version of PHP built-in function [array_column](http://php.net/manual/en/function.array-column.php) to accept multiple keys.

Test the following query

```js
{
  Creative(id: 1) {
    id,
    fqid
  }
}
```

So far, we have defined an object and its fields. Let's define another object inside a parent object. We can nest objects as deep as we can.

```git checkout step6-nested-object```