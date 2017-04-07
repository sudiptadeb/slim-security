## Slim Security
A PSR7 compliant PHP middleware to meet all your security needs.

This project has just started, but to give you an idea about how this will be when you use it. See the sample configuration below.

There are two ways to congifure the middleware.
* Directly when defining the middleware for each route
* Globally via a config file (sample configureation below) and just make sure that this is invoked for every request. This will provide a way for even non middleware based projects to use this by just manually calling this on every page

#### Sample configuration (middleware init)
```$xslt
$app->addRoute('/dashboard/add*',['POST'],function(){})
        ->add(new SDeb\slim-security\SeceuiryMiddleware(
        {
            "csrf":true,
            "auth":true,
            "role":["ADMIN"],
            "params":[
                {
                    "name":"id",
                    "type":"long",
                    "required":true
                },
                {
                    "name":"action",
                    "type":"regex",
                    "regex":"ADD|DELETE|MODIFY"
                    "required":true
                },            
            ]
        }))
```

#### Sample configuration (global config):
```$xslt
{
    "properties":{
        "csrf-param-name":"mycsrfparam",
        "csrf-cookie-name":"mycsrfcookie",
        "auth-provider":"Debmego\common\AuthProvider",
        "...":"..."
    },
    "paths":[
        {
        "path":"/dashboard/add*",
        "method":["POST"],
        "csrf":true,
        "auth":true,
        "role":["ADMIN"],
        "params":[
            {
                "name":"id",
                "type":"long",
                "required":true
            },
            {
                "name":"action",
                "type":"regex",
                "regex":"ADD|DELETE|MODIFY"
                "required":true
            },            
        ]
        }
    ]
}
```