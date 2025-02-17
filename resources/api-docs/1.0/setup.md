# Setup

---

- [API Request](#request)
- [Authentication](#authentication)
- [Endpoints](#endpoints)

<a name="request"></a>
## API Request

Before you can start interacting with the Kanka API, you need to generate a Key by navigating to your [Profile > API](https://kanka.io/en/settings/api) page in the app to generate a `key`.

![Api Request](/images/api-docs/api-request.png)

> {warning} Tokens are valid for 365 days. Never share your tokens with anyone!


<a name="authentication"></a>
## Authentication

Each request to the api requires an `oAuth 2.0` token to identify the user. Tokens can be generated in the user's profile page (`/en/settings/api`).

When calling the API, add the following headers:

```json
    Authorization: Bearer user_token_here
    Content-type: application/json
```

<a name="endpoints"></a>
### Endpoints

> {warning} Please note that all endpoints documented here need to be prefixed with `api/{{version}}/`. For example, if an endpoint is listed as `campaigns`, you should use `https://kanka.io/api/{{version}}/campaigns`.

### Throttling

The API is set up to allow a maximum of 30 requests per minute per client. When you exceed this limit, you will be greeted with a `429` error code.

You can increase this limit to 90 requests per minute by becoming a [Subscriber](https://kanka.io/en-US/pricing).

---
Next up: [Profile](/api-docs/{{version}}/profile)
