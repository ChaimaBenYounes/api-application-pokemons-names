# API Pokemon
> A RESTful API to list the name of Pokemons

## I used The API Platform Framework
> [API Platform](https://api-platform.com/) is a set of tools to build and consume web APIs

## I used a LexikJWTAuthenticationBundle
> API Platform allows to easily add a JWT-based authentication to your API using LexikJWTAuthenticationBundle.
> This bundle provides JWT(JSON Web Token) authentication for Symfony API. </br>
> This is a quick [manual](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md) for implementing `LexikJWTAuthenticationBundle`.
### 1. [User Provider](https://github.com/ChaimaBenYounes/api-plateforme-pokemons-names/blob/master/src/Entity/User.php)<br>
According to the API Platform documentation:</br>
LexikJWTAuthenticationBundle requires the application to have a properly configured user provider.</br>
I use the Doctrine user provider provided by Symfony (recommended): I create a custom user provider that implements UserInterface, because of Security component comes with API Platform I only need to create an entity named User. <br>
### 2. Add JWTAuthentcationBundle
```
composer require "lexik/jwt-authentication-bundle"
```
##### A. Generate the SSH keys
  ```
  $ mkdir -p config/jwt # For Symfony3+, no need of the -p option
  $ openssl genrsa -out config/jwt/private.pem -aes256 4096
  $ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
  ```
##### B. Configure the SSH keys path in [config/packages/lexik_jwt_authentication.yaml](https://github.com/ChaimaBenYounes/api-plateforme-pokemons-names/blob/master/config/packages/lexik_jwt_authentication.yaml) </br>
##### C. [Security System](https://github.com/ChaimaBenYounes/api-plateforme-pokemons-names/blob/master/config/packages/security.yaml) </br>
  We need to tell Symfony’s security system about our Provider and Authenticator: Configure config/packages/security.yaml </br>
 
</br>

### **JSON Web Tokens (JWT)**
> ![alt text](https://cdn-images-1.medium.com/max/2000/1*3yU_Zbhj9zDZwboFLHS1rg.png)
> - A client sends username/password combination to the server
> - The server validates the authentication
> - If authentication is successful, the server creates a JWT token else establishes an error response
> - On successful authentication, the client gets JWT token in the response body
> - Client stores that token in local storage or session storage.
> - From next time, the client for making any request supplies the JWT token in request headers like this. Authorization: Bearer <jwt_token>
> - Server upon receiving the JWT validates it and sends the successful response else error.
## Usage 
### 1- Get a JWT Token

Here’s what it looks like when we access **` POST /api/tokens `** via POSTman:</br>
> In POSTman I am making a POST request to the ` /api/tokens ` route with form data.
> I am passing in a email and password key/value pair to simulate the mock user logging in.

>![alt text](https://user-images.githubusercontent.com/29595380/53822051-38e59300-3f6f-11e9-8651-3c8e1aaee1de.png)

> Notice that the password and email match that of our sole mock user. Since everything matched and the user was ‘logged in’, the TokenController found in the login route returned a unique JWT token. Perfect. This token is what will be used to access our protected routes. In a production application, this would be sent to a frontend **[Client](https://github.com/ChaimaBenYounes/projet-pokemon-Management)** exemple  to be used when the client makes requests to protected backend routes.

### 2- Requesting Protected Routes
Here’s what it looks like when we access **`GET /api/pokemons`** via POSTman:</br>
> If we try to access a protected route without a JWT token: return ** 403 Forbidden **.</br>
> I passed the JWT token in a header named Authorization with the GET request. <br>
> On the flip-side, this is what it looks like when we get a ** 200 OK ** status:

>![alt text](https://user-images.githubusercontent.com/29595380/54075822-3901cd80-42a4-11e9-8f03-0a76423418c9.png)
<strong> OR </strong>
>![alt text](https://user-images.githubusercontent.com/29595380/54075826-3ef7ae80-42a4-11e9-81a3-f33c735268d4.png)

# Setup
> ![alt text](http://2.bp.blogspot.com/-4cll0p-0k7w/U7dct0dZEUI/AAAAAAABF9c/TwyCC93FEOY/s1600/to-be-continued1111112.png)

