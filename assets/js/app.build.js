/**
 * Created by gach on 21/02/14.
 */
(function (win, req, undefined) {

    "use strict";

    let paths = {

        // ACTIONS

        // CORE

        // LIBS

        // MODULES

        // PLUGINS

        // SHARED

        // GLOBAL
    };

    req.config({

        //"baseUrl": "http://www." + myDomain + "/" + version + "/js" + minify,

        // The number of seconds to wait before giving up on loading a script.
        // Setting it to 0 disables the timeout. The default is 7 seconds.
        "waitSeconds": 0,

        // DEV VERSION :

        "paths": paths

    });

    /*global define*/
    define([], {});
}(window, require));