/**
 * Created by Jerold on 6/16/2017.
 */
gapi.analytics.ready(function() {

    // Step 3: Authorize the user.

    var CLIENT_ID = '1082994385875-v56jf3jkghmf8dlb5ero1rbq1ivoaf3b.apps.googleusercontent.com';

    gapi.analytics.auth.authorize({
        container: 'auth-button',
        clientid: CLIENT_ID,
    });

    // Step 4: Create the view selector.

    var viewSelector = new gapi.analytics.ViewSelector({
        container: 'view-selector'
    });

    // Create charts

    // number of users by day of week
    var usersByDayOfWeek = new gapi.analytics.googleCharts.DataChart({
        reportType: 'ga',
        query: {
            'metrics': 'ga:users',
            'dimensions': 'ga:dayOfWeekName',
            'start-date': '7daysAgo',
            'end-date': 'yesterday',
            'sort': '-ga:users'
        },
        chart: {
            type: 'COLUMN',
            container: 'usersByDayOfWeekContainer',
            options:{
                title: 'Users by day of week (Last Week)',
                width: '100%',
                pieHole: 4/9
            },
        }

    });

    // new vs returning visitors in the last week
    var userNewVsReturningYesterday = new gapi.analytics.googleCharts.DataChart({
        reportType: 'ga',
        query: {
            'dimensions': 'ga:userType',
            'metrics': 'ga:users',
            'start-date': '1daysAgo',
            'end-date': 'yesterday',
            'sort': '-ga:users'
        },
        chart: {
            type: 'PIE',
            container: 'userNewVsReturningYesterdayContainer',
            options:{
                title: 'New vs Returning users (Yesterday)',
                width: '100%',
                pieHole: 4/9
            },
        }

    });

    var userNewVsReturningToday = new gapi.analytics.googleCharts.DataChart({
        reportType: 'ga',
        query: {
            'dimensions': 'ga:userType',
            'metrics': 'ga:users',
            'start-date': '0daysAgo',
            'end-date': 'today',
            'sort': '-ga:users'
        },
        chart: {
            type: 'PIE',
            container: 'userNewVsReturningTodayContainer',
            options:{
                title: 'New vs Returning users (Today)',
                width: '100%',
                pieHole: 4/9
            },
        }

    });


    var userSources = new gapi.analytics.googleCharts.DataChart({
        reportType: 'ga',
        query: {
            'dimensions': 'ga:source',
            'metrics': 'ga:users',
            'start-date': '30daysAgo',
            'end-date': 'today',
            'sort': '-ga:users',
            'max-results': '10'
        },
        chart: {
            type: 'PIE',
            container: 'userSourcesContainer',
            options:{
                title: 'Users by source (last 30 days)',
                width: '100%',
                pieHole: 4/9
            },
        }
    });





    var userCities = new gapi.analytics.googleCharts.DataChart({
        reportType: 'ga',
        query: {
            'dimensions': 'ga:city',
            'metrics': 'ga:users',
            'start-date': '30daysAgo',
            'end-date': 'today',
            'sort': '-ga:users',
            'max-results': '10'
        },
        chart: {
            type: 'PIE',
            container: 'userCitiesContainer',
            options:{
                title: 'Users by City (last 30 days)',
                width: '100%',
                pieHole: 4/9
            },
        }

    });

    var operatingSystems = new gapi.analytics.googleCharts.DataChart({
        query: {
            metrics: 'ga:sessions',
            dimensions: 'ga:operatingsystem',
            'start-date': '30daysAgo',
            'end-date': 'today',
            'sort': '-ga:sessions'
        },
        chart: {
            container: 'topOperatingSystemsContainer',
            type: 'COLUMN',
            options: {
                width: '100%',
                pieHole: 4/9,
                title: 'Sessions by Operating Systems (last 30 days)',
            }
        }
    });

    // Step 6: Hook up the components to work together.

    gapi.analytics.auth.on('success', function(response) {
        viewSelector.execute();
    });

    viewSelector.on('change', function(ids) {
        var newIds = {
            query: {
                ids: ids
            }
        }
        usersByDayOfWeek.set(newIds).execute();
        operatingSystems.set(newIds).execute();
        userCities.set(newIds).execute();
        userNewVsReturningToday.set(newIds).execute();
        userNewVsReturningYesterday.set(newIds).execute();
        userSources.set(newIds).execute();

    });
});
