# Posts

---

- [All Posts](#all-posts)
- [Single Post](#post)
- [Create a Post](#create-post)
- [Update a Post](#update-post)
- [Delete a Post](#delete-post)

<a name="all-posts"></a>
## All Posts

You can get a list of all the posts of an entity by using the following endpoint.

> {warning} Don't forget that all endpoints documented here need to be prefixed with `api/{{version}}/campaigns/{campaign.id}/`.


| Method | URI | Headers |
| :- |   :-   |  :-  |
| GET/HEAD | `entities/{entity.id}/posts` | Default |

### Results
```json
{
    "data": [
        {
            "created_at":  "2019-01-30T00:01:44.000000Z",
            "created_by": 1,
            "entity_id": 69,
            "entry": "Lorem Ipsum",
            "entry_parsed": "Lorem Ipsum",
            "id": 31,
            "position": null,
            "visibility_id": 1,
            "name": "Secret Note",
            "settings": [],
            "updated_at":  "2019-08-29T13:48:54.000000Z",
            "updated_by": null
        }
    ]
}
```


<a name="post"></a>
## Post

To get the details of a single post, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| GET/HEAD | `entities/{entity.id}/posts/{post.id}` | Default |

### Results
```json
{
    "data": {
        "created_at":  "2019-01-30T00:01:44.000000Z",
        "created_by": 1,
        "entity_id": 69,
        "entry": "Lorem Ipsum",
        "entry_parsed": "Lorem Ipsum",
        "id": 31,
        "position": null,
        "visibility_id": 1,
        "name": "Secret Note",
        "settings": [],
        "updated_at":  "2019-08-29T13:48:54.000000Z",
        "updated_by": null
    }
}
```


<a name="create-post"></a>
## Create a Post

To create a post, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| POST | `entities/{entity.id}/posts` | Default |

### Body

| Parameter | Type | Detail |
| :- |   :-   |  :-  |
| `name` | `string` (Required) | Name of the post |
| `entry` | `string` | The post's entry (html) |
| `entity_id` | `integer` (Required) | The post's parent entity |
| `visibility_id` | `integer` | The visibility: 1 for `all`, 2 `self`, 3 `admin`, 4 `self-admin` or 5 `members`. |
| `position` | `int|null` (optional) | Position for ordering pinned posts |
| `settings` | `object` (optional) | `collapsed:1` if the pinned post should be collapsed on page load |

### Results

> {success} Code 200 with JSON body of the new post.


<a name="update-post"></a>
## Update a Post

To update a post, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| PUT/PATCH | `entities/{entity.id}/posts/{post.id}` | Default |

### Body

The same body parameters are available as for when creating a post.

### Results

> {success} Code 200 with JSON body of the updated post.


<a name="delete-post"></a>
## Delete a Post

To delete a post, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| DELETE | `entities/{entity.id}/posts/{post.id}` | Default |

### Results

> {success} Code 200 with JSON.
