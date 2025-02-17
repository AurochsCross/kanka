# Campaigns

---

- [User Campaigns](#user-campaigns)
- [Single Campaign](#campaign)
- [Campaign Members](#campaign-members)
- [Add Role To Member](#add-role-to-member)
- [Remove Role From Member](#remove-role-from-member)
<a name="user-campaigns"></a>
## User Campaigns

You can get a list of all the campaigns the user has access to using the following endpoint.

> {warning} Don't forget that all endpoints documented here need to be prefixed with `api/{{version}}/`. For example, `campaigns` becomes `kanka.io/api/{{version}}/campaigns`.


| Method | URI | Headers |
| :- |   :-   |  :-  |
| GET | `campaigns` | Default |

### Results
```json
{
    "data": [
        {
            "id": 1,
            "name": "Thaelia",
            "locale": "en",
            "entry": "\r\n<p>Aenean sit amet vehicula.</p>\r\n",
            "entry_parsed": "not available on the campaigns/ endpoint",
            "image": "{path}",
            "image_full": "{url}",
            "image_thumb": "{url}",
            "visibility": "public",
            "visibility_id": 2,
            "created_at": "2017-11-02T16:29:34.000000Z",
            "updated_at": "2020-05-23T22:00:02.000000Z",
            "members": [
                {
                    "id": 1,
                    "user": {
                        "id": 1,
                        "name": "Ilestis",
                        "avatar": "{url}"
                    }
                }
            ],
            "setting": [],
            "ui_settings": [],
            "default_images": [],
            "css": "..."
        }
    ],
    "links": {
        "first": "https://kanka.io/api/{{version}}/campaigns?page=1",
        "last": "https://kanka.io/api/{{version}}/campaigns?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://kanka.io/api/{{version}}/campaigns",
        "per_page": 15,
        "to": 3,
        "total": 3
    }
}
```

<a name="campaign"></a>
## Single Campaign

Getting a single campaign is straightforward. `{id}` is to be replaced with the campaign's id returned in the `campaigns` call.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| GET | `campaigns/{id}` | Default |

### Results
```json
{
    "data": {
        "id": 1,
        "name": "Thaelia",
        "locale": "fr",
        "entry": "\r\n<p>Aenean sit amet vehicula [character:133].</p>\r\n",
        "entry_parsed": "\r\n<p>Aenean sit amet vehicula <a href=\"...\">Lorem Ipsum</a>.</p>\r\n",
        "image": "{path}",
        "image_full": "{url}",
        "image_thumb": "{url}",
        "visibility": "public",
        "visibility_id": 2,
        "created_at": "2017-11-02T16:29:34.000000Z",
        "updated_at": "2020-05-23T22:00:02.000000Z",
        "members": [
            {
                "id": 1,
                "user": {
                    "id": 1,
                    "name": "Ilestis",
                    "avatar": "{url}"
                }
            }
        ],
        "setting": [],
        "ui_settings": [],
        "default_images": [],
        "css": "..."
    }
}
```

<a name="campaign-members"></a>
## Campaign Members

To get a list of all the members of a campaign, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| GET | `campaigns/{id}/users` | Default |

### Results
```json
{
    "data": [
        {
            "id": 1,
            "name": "Ilestis",
            "avatar": "{url}"
        }
    ]
}
```
<a name="add-role-to-member"></a>
## Add Role To Member

To add a role to a member of the campaign, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| POST | `campaigns/{id}/users` | Default |

### Results
```json
{
    "data": "role succesfully added to user"
}
```
<a name="remove-role-from-member"></a>
## Remove Role From Member

To remove a role from a member of the campaign, use the following endpoint.

| Method | URI | Headers |
| :- |   :-   |  :-  |
| DELETE | `campaigns/{id}/users` | Default |

### Results
```json
{
    "data": "role succesfully removed from user"
}
```