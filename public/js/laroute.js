(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"hrc.index","action":"App\Http\Controllers\User\Hrc\HomeController@index"},{"host":null,"methods":["POST"],"uri":"sign-in","name":"auth.signInSubmit","action":"App\Http\Controllers\User\AuthController@postSignIn"},{"host":null,"methods":["POST"],"uri":"sign-up","name":"auth.signUpSubmit","action":"App\Http\Controllers\User\AuthController@postSignUp"},{"host":null,"methods":["GET","HEAD"],"uri":"sign-in\/google","name":"auth.signIn.google","action":"App\Http\Controllers\User\GoogleServiceAuthController@redirect"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard","name":"dashboard.index","action":"App\Http\Controllers\User\Hrc\DashboardController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/the-le","name":"dashboard.rules","action":"App\Http\Controllers\User\Hrc\DashboardController@rules"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/thong-tin-ca-nhan","name":"dashboard.personal","action":"App\Http\Controllers\User\Hrc\DashboardController@personal"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/thong-tin-ca-nhan\/sua","name":"dashboard.editPersonal","action":"App\Http\Controllers\User\Hrc\DashboardController@editPersonal"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/danh-gia-ca-nhan","name":"dashboard.evaluation","action":"App\Http\Controllers\User\Hrc\DashboardController@evaluation"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/so-luoc-nganh-nghe","name":"dashboard.introduceMajor","action":"App\Http\Controllers\User\Hrc\DashboardController@introduceMajor"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/test-online","name":"dashboard.testOnline","action":"App\Http\Controllers\User\Hrc\DashboardController@testOnline"},{"host":null,"methods":["POST"],"uri":"api\/cap-nhat-thong-tin-ca-nhan","name":"api.updatePersonalInformation","action":"App\Http\Controllers\User\Hrc\FunctionalController@updatePersonalInformation"},{"host":null,"methods":["POST"],"uri":"api\/personality-test","name":"api.personalityTest","action":"App\Http\Controllers\User\Hrc\FunctionalController@personalityTest"},{"host":null,"methods":["POST"],"uri":"api\/test-online\/start","name":"api.testOnline.start","action":"App\Http\Controllers\User\Hrc\TestOnlineController@start"},{"host":null,"methods":["POST"],"uri":"api\/test-online\/answer","name":"api.testOnline.answer","action":"App\Http\Controllers\User\Hrc\TestOnlineController@answer"},{"host":null,"methods":["POST"],"uri":"api\/test-online\/submit","name":"api.testOnline.submit","action":"App\Http\Controllers\User\Hrc\TestOnlineController@submit"},{"host":null,"methods":["POST"],"uri":"api\/test-online\/updateCity","name":"api.testOnline.updateCity","action":"App\Http\Controllers\User\Hrc\TestOnlineController@updateCity"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                return this.getCorrectUrl(uri + qs);
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if(!this.absolute)
                    return url;

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

