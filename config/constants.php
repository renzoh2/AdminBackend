<?php

return [
    'status' => [
        'fail' => 'Fail',
        'success' => 'Success',
    ],
    'login' => [
        'required' => [
            'title' => ':attribute Required!',
            'message' => 'The :attribute is required.'
        ],
        'success' => [
            'title' => 'Login Success!',
            'message' => 'Login Credentials Authenticated'
        ],
        'fail' => [
            'title' => 'Login Error!',
            'message' => 'Login Credentials Failed to Authenticate. Please Try Again.'
        ]
    ],
    'products' => [
        'create' => [
            'title' => 'Product Added!',
            'message' => 'The Product is successfully added to list.'
        ],
        'update' => [
            'title' => 'Product Updated!',
            'message' => 'The Product is successfully updated to list.'
        ],
        'delete' => [
            'title' => 'Product Deleted!',
            'message' => 'The Product is successfully deleted to list.'
        ]
    ],
    'processFail' => [
        'title' => 'Process Failed!',
        'message' => 'Please Try Again.'
    ]
]

?>