$('document').ready(function () {
    $('.register').on('click', function register() {
        var poolData = {
            UserPoolId: 'us-east-2_4bvR0oGQq', // your user pool id here
            ClientId: '7tpjolv03m7o5buan8q1d9g6ra' // your app client id here
        };
        var userPool =
                new AmazonCognitoIdentity.CognitoUserPool(poolData);
        var attributeList = [];

        var dataEmail = {
            Name: 'email',
            Value: 'email@mydomain.com'
        };

        var dataPhoneNumber = {
            Name: 'phone_number',
            Value: '+15555555555'
        };
        var dataGivenName = {
            Name: 'given_name',
            Value: 'do'
        };
        var attributeEmail = new AmazonCognitoIdentity.CognitoUserAttribute(dataEmail);
        var attributePhoneNumber = new AmazonCognitoIdentity.CognitoUserAttribute(dataPhoneNumber);
        var attributeGivenName = new AmazonCognitoIdentity.CognitoUserAttribute(dataGivenName);

        attributeList.push(attributeEmail);
        attributeList.push(attributePhoneNumber);
        attributeList.push(attributeGivenName);
        console.log(attributeList);
        userPool.signUp('dathanh', 'Test123456@@', attributeList, null, function (err, result) {
            if (err) {
                console.log(err.message || JSON.stringify(err));
                return;
            }
            cognitoUser = result.user;
            console.log('user name is ' + cognitoUser.getUsername());
        });
    });
    $('.info').on('click', function getInfo() {
        var data = {UserPoolId: 'us-east-2_4bvR0oGQq',
            ClientId: '7tpjolv03m7o5buan8q1d9g6ra'
        };
        var userPool = new AmazonCognitoIdentity.CognitoUserPool(data);
        var cognitoUser = userPool.getCurrentUser();

        if (cognitoUser != null) {
            cognitoUser.getSession(function (err, session) {
                if (err) {
                    alert(err);
                    return;
                }
                console.log('session validity: ' + session.isValid());
                console.log(cognitoUser);
            });
        }
    });
    $('.login').on('click', function () {
        var authenticationData = {
            Username: 'dathanh',
            Password: 'Test123456@@',
        };
        var authenticationDetails = new AmazonCognitoIdentity.AuthenticationDetails(authenticationData);
        var poolData = {UserPoolId: 'us-east-2_4bvR0oGQq', // your user pool id here
            ClientId: '7tpjolv03m7o5buan8q1d9g6ra' // your app client id here
        };
        var userPool = new AmazonCognitoIdentity.CognitoUserPool(poolData);
        var userData = {
            Username: 'dathanh',
            Pool: userPool
        };
        var cognitoUser = new AmazonCognitoIdentity.CognitoUser(userData);
        cognitoUser.authenticateUser(authenticationDetails, {
            onSuccess: function (result) {
                var accessToken = result.getAccessToken().getJwtToken();
                console.log("accessToken: "+accessToken);
                /* Use the idToken for Logins Map when Federating User Pools with identity pools or when passing through an Authorization Header to an API Gateway Authorizer*/
                var idToken = result.idToken.jwtToken;
                console.log("idToken: "+idToken);
            },

            onFailure: function (err) {
                console.log(err);
            },

        });
    });
    $('.delete').on('click', function () {
        cognitoUser.deleteUser(function (err, result) {
            if (err) {
                alert(err);
                return;
            }
            console.log('call result: ' + result);
        });
    });
});