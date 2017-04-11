
## Installation

run composer to install dependencies. We are using [graphql-php](https://github.com/webonyx/graphql-php) package.

```composer install```

## Usage

1. Run ```php -S localhost:8080 server.php``` to launch a server
2. Download [GraphiQL for Chrome](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij?hl=en) or [GraphiQL for Mac OS](https://github.com/skevy/graphiql-app/releases)
3. Open GraphiQL and hit "Docs"
4. Run the following query

```js
{
  HelloWorld
}
```
You should see the following response
```js
{
  "data": {
    "HelloWorld": "Hello World"
  }
}
```

## Running with Docker

1. Build ```docker build -t graphql-examples .```
2. Install composer ```docker run -it -v $(PWD):/var/www graphql-examples composer install```
3. Run the server ```docker run -it -p 8080:80 -v $(PWD):/var/www graphql-examples php -S 0.0.0.0:80 server.php```


Checkout each branch and play with it.


## Branches

| Branch | Description |
|--------|--------|
|  step1-helloworld | Our first field "HelloWorld" on the root Query object |
|  step2-defining-object | Demonstrate how we define a custom object|
| step3-returning-data-for-object| Demonstrate how to process query and return data|
|step4-passing-argument| Demonstrate how we can process object argument|
|step5-selective-query| Demonstrate how we can selectively query datasource|
|step6-nested-object| Demonstrate how we can nest an object inside a parent object|