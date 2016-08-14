<?php

// Excel DateTimeStamp  Result            Comments
return [
    [ 714,              -2147472000 ],    //  PHP 32-bit Earliest Date        14-Dec-1901
    [ 1461,             -2082931200 ],    //                                  31-Dec-1903
    [ 1462,             -2082844800 ],    //  Excel 1904 Calendar Base Date   01-Jan-1904
    [ 1463,             -2082758400 ],    //                                  02-Jan-1904
    [ 22269,            -285120000  ],    //                                  19-Dec-1960
    [ 25569,            0           ],    //  PHP Base Date                   01-Jan-1970
    [ 30292,            408067200   ],    //                                  07-Dec-1982
    [ 39611,            1213228800  ],    //                                  12-Jun-2008
    [ 50424,            2147472000  ],    //  PHP 32-bit Latest Date          19-Jan-2038
    [ 1234.56789,       -2102494934 ],    //                                  18-May-1903 13:37:46
    [ 12345.6789,       -1142494943 ],    //                                  18-Oct-1933 16:17:37
    [ 0.5,              43200       ],    //                                  12:00:00
    [ 0.75,             64800       ],    //                                  18:00.00
    [ 0.12345,          10666       ],    //                                  02:57:46
];
