<?php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=ads', 'nicole', 'bakagaki');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// error_reporting(E_ALL);

// $ads = 

if(!empty($_POST)){
    $ad = [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'contact_name' => $_POST['contact_name'],
        'contact_email' => $_POST['contact_email']
    ];
    $query = $dbc->prepare('INSERT INTO ads (title, body, contact_name, contact_email) VALUES (:title, :body, :contact_name, :contact_email)');

    $query->bindValue(':title', $ad['title'], PDO::PARAM_STR);
    $query->bindValue(':body', $ad['body'], PDO::PARAM_STR);
    $query->bindValue(':contact_name', $ad['contact_name'], PDO::PARAM_STR);
    $query->bindValue(':contact_email', $ad['contact_email'], PDO::PARAM_STR);
    $query->execute();
}

$ads = $dbc->query('SELECT * FROM ads')->fetchAll(PDO::FETCH_ASSOC);
//$query->execute();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Super Ad website - practice in Javascript</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://underscorejs.org/underscore-min.js"></script>
    <script src="http://backbonejs.org/backbone-min.js"></script>
    
</head>

<body>
    <div class="container" id="AdListView">
        <li id="AdView"></li>
    </div>

            
    <div class="container" id="createNewAd">
        <h1>Create a New Ad</h1>
        <form role="form" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="A title for your ad">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="6"></textarea>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Who you gonna call?">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Email address to contact at">
            </div>
            <!-- <button type="submit" id="createNewAd" class="btn btn-primary" style="cursor: pointer; text-decoration: underline"> -->
                <!-- Create new ad!</button> -->

        </form>
    </div>

 </body>
 </html>   

<script>
(function($){
    Backbone.sync = function(method, model, success, error){
            success();
    }

    var Ad = Backbone.Model.extend({
        defaults: {
            title: 'title',
            body: 'body',
            contactName: 'contact_name',
            contactEmail: 'contact_email'
            // createdAt: ""
        }
    });
    
    var Ads = Backbone.Collection.extend({
        model: Ad
    });

    var AdView = Backbone.View.extend({
        el:'body',
        events: {
            'click h1': 'show',
            // 'click h1': 'hide'
        },

        initialize: function(){
            _.bindAll(this, 'render', 'unrender', 'edit', 'remove');
            this.collection = new Ads();
            this.collection.bind('ad');
            this.model.bind('edit', this.render);
            this.model.bind('remove', this.unrender);
            this.render();
        },
        render: function(){
            $(this.el).html('testing');
            console.log('render adview');
            $(this.el).html('<h2>' + this.model.get('title') + '</h2><br>'
            + '<p>' + this.model.get('body') + '<br>'
            + this.model.get('contactName') + '<br>'
            + this.model.get('contactEmail') + '<br>'
            + this.model.get('createdAt') + '<br></p>');
            this.render();
            return this;
        },

        show: function(){
            $('.h2', this.el).on('click', show )
            {
                this.model.get('body'),
                this.model.get('contactName'),
                this.model.get('contactEmail')
            };
            this.render();
        },

        unrender:function(){
            $(this.el).remove();
        },
        edit:function(){
            $(this.el).edit(); //figure this out later
        },
        remove: function(){
            this.model.destroy();
        }
    });

    var AdListView = Backbone.View.extend({
        el: '#AdListView',

        events:{
            'click button#createNewAd': 'createNewAd'
        },

        initialize: function(){
            _.bindAll(this, 'render', 'createNewAd', 'appendNewAd');
            // this.collection = new Ads();
            //this.collection.bind('createNewAd');
            // this.model.bind('createNewAd', this.render);
            console.log('pre-render');
            this.render();
            console.log('post-render');
        },
        render:function(){
            this.$el.html('hello again');
            // console.log(this.$el);
            //var self = this;
            this.$el.append("<h1>Super Ad site - practice in Javascript with Databases</h2>");
            // this.$el.show(Ads);
            this.$el.append("<h2>" + this.model.get('title') + "</h2>");
            this.$el.append("<button id='createNewAd'> Create New Ad</button>");
            this.$el.append("<ul></ul>");
            this.$el.show('createNewAd');
            _(this.collection.models).each(function(item){
                self.appendNewAd(ad);
            }, this);
            return this;
        },

        createNewAd: function(){
            // var title = $_POST('title');
            // var body = $_POST('body');
            // var contactName = $_POST('contact_name');
            // var contactEmail = $_POST('contact_email');

            var ad = new Ad({
                title: title,
                body: body,
                contactName: contactName,
                contactEmail: contactEmail
            });
            
            this.collection.add(ad);
        },

        appendNewAd: function(ad){
            var AdListView = new AdListView({
                model: ad
            });
            $('ul', this.el).append(adView.render().el);
        }
    });
    var AdListView = new AdListView();

})(jQuery);
</script>