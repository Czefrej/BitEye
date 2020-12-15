<?php
return [
    "free"=>[
        "apiRequestsPerMinute"=>0,
        "search"=>[
            "maxCategories"=>1,
            "availableHistory"=>7+1+30
        ]
    ],
    "bronze"=>[
        "apiRequestsPerMinute"=>0,
        "search"=>[
            "maxCategories"=>2,
            "availableHistory"=>30,
        ]
    ],
    "silver"=>[
        "apiRequestsPerMinute"=>60,
        "search"=>[
            "maxCategories"=>3,
            "availableHistory"=>30*3,
        ]
    ],
    "golden"=>[

    ],
    "platinum"=>[

    ],
    "diamond"=>[

    ]

];
