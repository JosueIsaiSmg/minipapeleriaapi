<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8081";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-products">
                                <a href="#endpoints-GETapi-products">GET api/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-products">
                                <a href="#endpoints-POSTapi-products">POST api/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products--id-">
                                <a href="#endpoints-GETapi-products--id-">GET api/products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-products--id-">
                                <a href="#endpoints-PUTapi-products--id-">PUT api/products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-products--id-">
                                <a href="#endpoints-DELETEapi-products--id-">DELETE api/products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-services">
                                <a href="#endpoints-GETapi-services">GET api/services</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-services">
                                <a href="#endpoints-POSTapi-services">POST api/services</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-services--id-">
                                <a href="#endpoints-GETapi-services--id-">GET api/services/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-services--id-">
                                <a href="#endpoints-PUTapi-services--id-">PUT api/services/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-services--id-">
                                <a href="#endpoints-DELETEapi-services--id-">DELETE api/services/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-service-pricing-rules">
                                <a href="#endpoints-GETapi-service-pricing-rules">GET api/service-pricing-rules</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-service-pricing-rules">
                                <a href="#endpoints-POSTapi-service-pricing-rules">POST api/service-pricing-rules</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-service-pricing-rules--id-">
                                <a href="#endpoints-GETapi-service-pricing-rules--id-">GET api/service-pricing-rules/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-service-pricing-rules--id-">
                                <a href="#endpoints-PUTapi-service-pricing-rules--id-">PUT api/service-pricing-rules/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-service-pricing-rules--id-">
                                <a href="#endpoints-DELETEapi-service-pricing-rules--id-">DELETE api/service-pricing-rules/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-service-consumables">
                                <a href="#endpoints-GETapi-service-consumables">GET api/service-consumables</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-service-consumables">
                                <a href="#endpoints-POSTapi-service-consumables">POST api/service-consumables</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-service-consumables--id-">
                                <a href="#endpoints-GETapi-service-consumables--id-">GET api/service-consumables/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-service-consumables--id-">
                                <a href="#endpoints-PUTapi-service-consumables--id-">PUT api/service-consumables/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-service-consumables--id-">
                                <a href="#endpoints-DELETEapi-service-consumables--id-">DELETE api/service-consumables/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-bundles">
                                <a href="#endpoints-GETapi-bundles">GET api/bundles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-bundles">
                                <a href="#endpoints-POSTapi-bundles">POST api/bundles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-bundles--id-">
                                <a href="#endpoints-GETapi-bundles--id-">GET api/bundles/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-bundles--id-">
                                <a href="#endpoints-PUTapi-bundles--id-">PUT api/bundles/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-bundles--id-">
                                <a href="#endpoints-DELETEapi-bundles--id-">DELETE api/bundles/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-bundle-items">
                                <a href="#endpoints-GETapi-bundle-items">GET api/bundle-items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-bundle-items">
                                <a href="#endpoints-POSTapi-bundle-items">POST api/bundle-items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-bundle-items--id-">
                                <a href="#endpoints-GETapi-bundle-items--id-">GET api/bundle-items/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-bundle-items--id-">
                                <a href="#endpoints-PUTapi-bundle-items--id-">PUT api/bundle-items/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-bundle-items--id-">
                                <a href="#endpoints-DELETEapi-bundle-items--id-">DELETE api/bundle-items/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-customers">
                                <a href="#endpoints-GETapi-customers">GET api/customers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-customers">
                                <a href="#endpoints-POSTapi-customers">POST api/customers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-customers--id-">
                                <a href="#endpoints-GETapi-customers--id-">GET api/customers/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-customers--id-">
                                <a href="#endpoints-PUTapi-customers--id-">PUT api/customers/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-customers--id-">
                                <a href="#endpoints-DELETEapi-customers--id-">DELETE api/customers/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders">
                                <a href="#endpoints-GETapi-orders">GET api/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-orders">
                                <a href="#endpoints-POSTapi-orders">POST api/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders--id-">
                                <a href="#endpoints-GETapi-orders--id-">GET api/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-orders--id-">
                                <a href="#endpoints-PUTapi-orders--id-">PUT api/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-orders--id-">
                                <a href="#endpoints-DELETEapi-orders--id-">DELETE api/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-order-items">
                                <a href="#endpoints-GETapi-order-items">GET api/order-items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-order-items">
                                <a href="#endpoints-POSTapi-order-items">POST api/order-items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-order-items--id-">
                                <a href="#endpoints-GETapi-order-items--id-">GET api/order-items/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-order-items--id-">
                                <a href="#endpoints-PUTapi-order-items--id-">PUT api/order-items/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-order-items--id-">
                                <a href="#endpoints-DELETEapi-order-items--id-">DELETE api/order-items/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 31, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8081</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-products">GET api/products</h2>

<p>
</p>



<span id="example-requests-GETapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Lapiz #10&quot;,
        &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
        &quot;price&quot;: &quot;6.00&quot;,
        &quot;stock&quot;: 14,
        &quot;category&quot;: &quot;prod&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T21:13:06.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Hojas opalina&quot;,
        &quot;description&quot;: &quot;Paquete de 100 hojas opalina&quot;,
        &quot;price&quot;: &quot;120.00&quot;,
        &quot;stock&quot;: 50,
        &quot;category&quot;: &quot;paper&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Velas decorativas&quot;,
        &quot;description&quot;: &quot;Velas para cumplea&ntilde;os&quot;,
        &quot;price&quot;: &quot;25.00&quot;,
        &quot;stock&quot;: 200,
        &quot;category&quot;: &quot;decor&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
    },
    {
        &quot;id&quot;: 5,
        &quot;name&quot;: &quot;Lapiz #2&quot;,
        &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
        &quot;price&quot;: &quot;6.00&quot;,
        &quot;stock&quot;: 14,
        &quot;category&quot;: &quot;prod&quot;,
        &quot;created_at&quot;: &quot;2025-12-29T21:12:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T21:12:46.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-products">POST api/products</h2>

<p>
</p>



<span id="example-requests-POSTapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Lapiz #2\",
    \"description\": \"Eius et animi quos velit et.\",
    \"price\": 6,
    \"stock\": 14,
    \"category\": \"prod\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Lapiz #2",
    "description": "Eius et animi quos velit et.",
    "price": 6,
    "stock": 14,
    "category": "prod"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-products">
</span>
<span id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-products" data-method="POST"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products"
                    onclick="tryItOut('POSTapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products"
                    onclick="cancelTryOut('POSTapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-products"
               value="Lapiz #2"
               data-component="body">
    <br>
<p>The name of the product. Example: <code>Lapiz #2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-products"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>The description of the product. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-products"
               value="6"
               data-component="body">
    <br>
<p>The price of the product. Example: <code>6</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="POSTapi-products"
               value="14"
               data-component="body">
    <br>
<p>The stock quantity of the product. Example: <code>14</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="POSTapi-products"
               value="prod"
               data-component="body">
    <br>
<p>The category of the product. Example: <code>prod</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-products--id-">GET api/products/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Lapiz #10&quot;,
    &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
    &quot;price&quot;: &quot;6.00&quot;,
    &quot;stock&quot;: 14,
    &quot;category&quot;: &quot;prod&quot;,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-29T21:13:06.000000Z&quot;,
    &quot;bundle_items&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--id-" data-method="GET"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--id-"
                    onclick="tryItOut('GETapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--id-"
                    onclick="cancelTryOut('GETapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-products--id-">PUT api/products/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Lapiz #2\",
    \"description\": \"Eius et animi quos velit et.\",
    \"price\": 6,
    \"stock\": 14,
    \"category\": \"prod\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Lapiz #2",
    "description": "Eius et animi quos velit et.",
    "price": 6,
    "stock": 14,
    "category": "prod"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-products--id-">
</span>
<span id="execution-results-PUTapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-products--id-" data-method="PUT"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-products--id-"
                    onclick="tryItOut('PUTapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-products--id-"
                    onclick="cancelTryOut('PUTapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-products--id-"
               value="Lapiz #2"
               data-component="body">
    <br>
<p>The name of the product. Example: <code>Lapiz #2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-products--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>The description of the product. Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-products--id-"
               value="6"
               data-component="body">
    <br>
<p>The price of the product. Example: <code>6</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="PUTapi-products--id-"
               value="14"
               data-component="body">
    <br>
<p>The stock quantity of the product. Example: <code>14</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="PUTapi-products--id-"
               value="prod"
               data-component="body">
    <br>
<p>The category of the product. Example: <code>prod</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-products--id-">DELETE api/products/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-products--id-">
</span>
<span id="execution-results-DELETEapi-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-products--id-" data-method="DELETE"
      data-path="api/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-products--id-"
                    onclick="tryItOut('DELETEapi-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-products--id-"
                    onclick="cancelTryOut('DELETEapi-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-services">GET api/services</h2>

<p>
</p>



<span id="example-requests-GETapi-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-services">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Impresion&quot;,
        &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;,
        &quot;pricing_rules&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;service_id&quot;: 1,
                &quot;condition_type&quot;: &quot;quantity&quot;,
                &quot;condition_value&quot;: &quot;architecto&quot;,
                &quot;min_quantity&quot;: 10,
                &quot;max_quantity&quot;: 100,
                &quot;material&quot;: &quot;glossy&quot;,
                &quot;size&quot;: &quot;architecto&quot;,
                &quot;doc_type&quot;: &quot;architecto&quot;,
                &quot;price&quot;: &quot;50.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-29T17:25:12.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;service_id&quot;: 1,
                &quot;condition_type&quot;: &quot;quantity&quot;,
                &quot;condition_value&quot;: null,
                &quot;min_quantity&quot;: 1,
                &quot;max_quantity&quot;: 100,
                &quot;material&quot;: null,
                &quot;size&quot;: null,
                &quot;doc_type&quot;: null,
                &quot;price&quot;: &quot;4.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;service_id&quot;: 1,
                &quot;condition_type&quot;: &quot;quantity&quot;,
                &quot;condition_value&quot;: null,
                &quot;min_quantity&quot;: 101,
                &quot;max_quantity&quot;: null,
                &quot;material&quot;: null,
                &quot;size&quot;: null,
                &quot;doc_type&quot;: null,
                &quot;price&quot;: &quot;2.50&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;service_id&quot;: 1,
                &quot;condition_type&quot;: &quot;material&quot;,
                &quot;condition_value&quot;: null,
                &quot;min_quantity&quot;: null,
                &quot;max_quantity&quot;: null,
                &quot;material&quot;: &quot;opalina&quot;,
                &quot;size&quot;: null,
                &quot;doc_type&quot;: null,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            }
        ],
        &quot;consumables&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;service_id&quot;: 1,
                &quot;product_id&quot;: 2,
                &quot;units_per_service&quot;: &quot;1.000&quot;,
                &quot;material&quot;: &quot;opalina&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Enmicado&quot;,
        &quot;description&quot;: &quot;Protecci&oacute;n de documentos en mica&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;pricing_rules&quot;: [],
        &quot;consumables&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;service_id&quot;: 2,
                &quot;product_id&quot;: 2,
                &quot;units_per_service&quot;: &quot;2.000&quot;,
                &quot;material&quot;: &quot;glossy&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-29T18:01:08.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Engargolado&quot;,
        &quot;description&quot;: &quot;Engargolado de hojas con espiral&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;pricing_rules&quot;: [
            {
                &quot;id&quot;: 5,
                &quot;service_id&quot;: 3,
                &quot;condition_type&quot;: &quot;quantity&quot;,
                &quot;condition_value&quot;: null,
                &quot;min_quantity&quot;: 30,
                &quot;max_quantity&quot;: 30,
                &quot;material&quot;: null,
                &quot;size&quot;: null,
                &quot;doc_type&quot;: null,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;service_id&quot;: 3,
                &quot;condition_type&quot;: &quot;quantity&quot;,
                &quot;condition_value&quot;: null,
                &quot;min_quantity&quot;: 31,
                &quot;max_quantity&quot;: 70,
                &quot;material&quot;: null,
                &quot;size&quot;: null,
                &quot;doc_type&quot;: null,
                &quot;price&quot;: &quot;25.00&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            }
        ],
        &quot;consumables&quot;: []
    },
    {
        &quot;id&quot;: 4,
        &quot;name&quot;: &quot;architecto&quot;,
        &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
        &quot;created_at&quot;: &quot;2025-12-30T04:45:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-30T04:45:45.000000Z&quot;,
        &quot;pricing_rules&quot;: [],
        &quot;consumables&quot;: []
    },
    {
        &quot;id&quot;: 5,
        &quot;name&quot;: &quot;architecto&quot;,
        &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
        &quot;created_at&quot;: &quot;2025-12-30T04:45:54.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-30T04:45:54.000000Z&quot;,
        &quot;pricing_rules&quot;: [],
        &quot;consumables&quot;: []
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-services" data-method="GET"
      data-path="api/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-services"
                    onclick="tryItOut('GETapi-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-services"
                    onclick="cancelTryOut('GETapi-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-services">POST api/services</h2>

<p>
</p>



<span id="example-requests-POSTapi-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Impresion\",
    \"description\": \"Servicio de impresion de documentos\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Impresion",
    "description": "Servicio de impresion de documentos"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-services">
</span>
<span id="execution-results-POSTapi-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-services" data-method="POST"
      data-path="api/services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-services"
                    onclick="tryItOut('POSTapi-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-services"
                    onclick="cancelTryOut('POSTapi-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-services"
               value="Impresion"
               data-component="body">
    <br>
<p>The name of the service. Example: <code>Impresion</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-services"
               value="Servicio de impresion de documentos"
               data-component="body">
    <br>
<p>The description of the service. Example: <code>Servicio de impresion de documentos</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-services--id-">GET api/services/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/services/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/services/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-services--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Impresion&quot;,
    &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;,
    &quot;pricing_rules&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;service_id&quot;: 1,
            &quot;condition_type&quot;: &quot;quantity&quot;,
            &quot;condition_value&quot;: &quot;architecto&quot;,
            &quot;min_quantity&quot;: 10,
            &quot;max_quantity&quot;: 100,
            &quot;material&quot;: &quot;glossy&quot;,
            &quot;size&quot;: &quot;architecto&quot;,
            &quot;doc_type&quot;: &quot;architecto&quot;,
            &quot;price&quot;: &quot;50.00&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-29T17:25:12.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;service_id&quot;: 1,
            &quot;condition_type&quot;: &quot;quantity&quot;,
            &quot;condition_value&quot;: null,
            &quot;min_quantity&quot;: 1,
            &quot;max_quantity&quot;: 100,
            &quot;material&quot;: null,
            &quot;size&quot;: null,
            &quot;doc_type&quot;: null,
            &quot;price&quot;: &quot;4.00&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;service_id&quot;: 1,
            &quot;condition_type&quot;: &quot;quantity&quot;,
            &quot;condition_value&quot;: null,
            &quot;min_quantity&quot;: 101,
            &quot;max_quantity&quot;: null,
            &quot;material&quot;: null,
            &quot;size&quot;: null,
            &quot;doc_type&quot;: null,
            &quot;price&quot;: &quot;2.50&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;service_id&quot;: 1,
            &quot;condition_type&quot;: &quot;material&quot;,
            &quot;condition_value&quot;: null,
            &quot;min_quantity&quot;: null,
            &quot;max_quantity&quot;: null,
            &quot;material&quot;: &quot;opalina&quot;,
            &quot;size&quot;: null,
            &quot;doc_type&quot;: null,
            &quot;price&quot;: &quot;5.00&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    ],
    &quot;consumables&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;service_id&quot;: 1,
            &quot;product_id&quot;: 2,
            &quot;units_per_service&quot;: &quot;1.000&quot;,
            &quot;material&quot;: &quot;opalina&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    ],
    &quot;bundle_items&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;bundle_id&quot;: 3,
            &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
            &quot;item_id&quot;: 1,
            &quot;quantity&quot;: 2,
            &quot;created_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-services--id-" data-method="GET"
      data-path="api/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-services--id-"
                    onclick="tryItOut('GETapi-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-services--id-"
                    onclick="cancelTryOut('GETapi-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-services--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-services--id-">PUT api/services/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/services/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Impresion\",
    \"description\": \"Servicio de impresion de documentos\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/services/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Impresion",
    "description": "Servicio de impresion de documentos"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-services--id-">
</span>
<span id="execution-results-PUTapi-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-services--id-" data-method="PUT"
      data-path="api/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-services--id-"
                    onclick="tryItOut('PUTapi-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-services--id-"
                    onclick="cancelTryOut('PUTapi-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/services/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-services--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-services--id-"
               value="Impresion"
               data-component="body">
    <br>
<p>The name of the service. Example: <code>Impresion</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-services--id-"
               value="Servicio de impresion de documentos"
               data-component="body">
    <br>
<p>The description of the service. Example: <code>Servicio de impresion de documentos</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-services--id-">DELETE api/services/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-services--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/services/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/services/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-services--id-">
</span>
<span id="execution-results-DELETEapi-services--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-services--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-services--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-services--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-services--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-services--id-" data-method="DELETE"
      data-path="api/services/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-services--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-services--id-"
                    onclick="tryItOut('DELETEapi-services--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-services--id-"
                    onclick="cancelTryOut('DELETEapi-services--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-services--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/services/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-services--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-services--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-service-pricing-rules">GET api/service-pricing-rules</h2>

<p>
</p>



<span id="example-requests-GETapi-service-pricing-rules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/service-pricing-rules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-pricing-rules"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service-pricing-rules">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;service_id&quot;: 1,
        &quot;condition_type&quot;: &quot;quantity&quot;,
        &quot;condition_value&quot;: &quot;architecto&quot;,
        &quot;min_quantity&quot;: 10,
        &quot;max_quantity&quot;: 100,
        &quot;material&quot;: &quot;glossy&quot;,
        &quot;size&quot;: &quot;architecto&quot;,
        &quot;doc_type&quot;: &quot;architecto&quot;,
        &quot;price&quot;: &quot;50.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T17:25:12.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;condition_type&quot;: &quot;quantity&quot;,
        &quot;condition_value&quot;: null,
        &quot;min_quantity&quot;: 1,
        &quot;max_quantity&quot;: 100,
        &quot;material&quot;: null,
        &quot;size&quot;: null,
        &quot;doc_type&quot;: null,
        &quot;price&quot;: &quot;4.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 3,
        &quot;service_id&quot;: 1,
        &quot;condition_type&quot;: &quot;quantity&quot;,
        &quot;condition_value&quot;: null,
        &quot;min_quantity&quot;: 101,
        &quot;max_quantity&quot;: null,
        &quot;material&quot;: null,
        &quot;size&quot;: null,
        &quot;doc_type&quot;: null,
        &quot;price&quot;: &quot;2.50&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 4,
        &quot;service_id&quot;: 1,
        &quot;condition_type&quot;: &quot;material&quot;,
        &quot;condition_value&quot;: null,
        &quot;min_quantity&quot;: null,
        &quot;max_quantity&quot;: null,
        &quot;material&quot;: &quot;opalina&quot;,
        &quot;size&quot;: null,
        &quot;doc_type&quot;: null,
        &quot;price&quot;: &quot;5.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 5,
        &quot;service_id&quot;: 3,
        &quot;condition_type&quot;: &quot;quantity&quot;,
        &quot;condition_value&quot;: null,
        &quot;min_quantity&quot;: 30,
        &quot;max_quantity&quot;: 30,
        &quot;material&quot;: null,
        &quot;size&quot;: null,
        &quot;doc_type&quot;: null,
        &quot;price&quot;: &quot;20.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Engargolado&quot;,
            &quot;description&quot;: &quot;Engargolado de hojas con espiral&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 6,
        &quot;service_id&quot;: 3,
        &quot;condition_type&quot;: &quot;quantity&quot;,
        &quot;condition_value&quot;: null,
        &quot;min_quantity&quot;: 31,
        &quot;max_quantity&quot;: 70,
        &quot;material&quot;: null,
        &quot;size&quot;: null,
        &quot;doc_type&quot;: null,
        &quot;price&quot;: &quot;25.00&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Engargolado&quot;,
            &quot;description&quot;: &quot;Engargolado de hojas con espiral&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service-pricing-rules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service-pricing-rules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service-pricing-rules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service-pricing-rules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service-pricing-rules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service-pricing-rules" data-method="GET"
      data-path="api/service-pricing-rules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service-pricing-rules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service-pricing-rules"
                    onclick="tryItOut('GETapi-service-pricing-rules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service-pricing-rules"
                    onclick="cancelTryOut('GETapi-service-pricing-rules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service-pricing-rules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service-pricing-rules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service-pricing-rules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service-pricing-rules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-service-pricing-rules">POST api/service-pricing-rules</h2>

<p>
</p>



<span id="example-requests-POSTapi-service-pricing-rules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/service-pricing-rules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"service_id\": 1,
    \"condition_type\": \"quantity\",
    \"price\": 50,
    \"min_quantity\": 10,
    \"max_quantity\": 100,
    \"material\": \"glossy\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-pricing-rules"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": 1,
    "condition_type": "quantity",
    "price": 50,
    "min_quantity": 10,
    "max_quantity": 100,
    "material": "glossy"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-service-pricing-rules">
</span>
<span id="execution-results-POSTapi-service-pricing-rules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-service-pricing-rules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-service-pricing-rules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-service-pricing-rules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-service-pricing-rules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-service-pricing-rules" data-method="POST"
      data-path="api/service-pricing-rules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-service-pricing-rules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-service-pricing-rules"
                    onclick="tryItOut('POSTapi-service-pricing-rules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-service-pricing-rules"
                    onclick="cancelTryOut('POSTapi-service-pricing-rules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-service-pricing-rules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/service-pricing-rules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-service-pricing-rules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-service-pricing-rules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="service_id"                data-endpoint="POSTapi-service-pricing-rules"
               value="1"
               data-component="body">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>condition_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="condition_type"                data-endpoint="POSTapi-service-pricing-rules"
               value="quantity"
               data-component="body">
    <br>
<p>The type of condition for the pricing rule. Example: <code>quantity</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-service-pricing-rules"
               value="50"
               data-component="body">
    <br>
<p>The price associated with the pricing rule. Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_quantity"                data-endpoint="POSTapi-service-pricing-rules"
               value="10"
               data-component="body">
    <br>
<p>The minimum quantity for the pricing rule. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_quantity"                data-endpoint="POSTapi-service-pricing-rules"
               value="100"
               data-component="body">
    <br>
<p>The maximum quantity for the pricing rule. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>material</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="material"                data-endpoint="POSTapi-service-pricing-rules"
               value="glossy"
               data-component="body">
    <br>
<p>The material associated with the pricing rule. Example: <code>glossy</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-service-pricing-rules--id-">GET api/service-pricing-rules/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-service-pricing-rules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/service-pricing-rules/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-pricing-rules/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service-pricing-rules--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;service_id&quot;: 1,
    &quot;condition_type&quot;: &quot;quantity&quot;,
    &quot;condition_value&quot;: &quot;architecto&quot;,
    &quot;min_quantity&quot;: 10,
    &quot;max_quantity&quot;: 100,
    &quot;material&quot;: &quot;glossy&quot;,
    &quot;size&quot;: &quot;architecto&quot;,
    &quot;doc_type&quot;: &quot;architecto&quot;,
    &quot;price&quot;: &quot;50.00&quot;,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-29T17:25:12.000000Z&quot;,
    &quot;service&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Impresion&quot;,
        &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service-pricing-rules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service-pricing-rules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service-pricing-rules--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service-pricing-rules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service-pricing-rules--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service-pricing-rules--id-" data-method="GET"
      data-path="api/service-pricing-rules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service-pricing-rules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service-pricing-rules--id-"
                    onclick="tryItOut('GETapi-service-pricing-rules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service-pricing-rules--id-"
                    onclick="cancelTryOut('GETapi-service-pricing-rules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service-pricing-rules--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service-pricing-rules/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service-pricing-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service-pricing-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-service-pricing-rules--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service pricing rule. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-service-pricing-rules--id-">PUT api/service-pricing-rules/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-service-pricing-rules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/service-pricing-rules/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"service_id\": 1,
    \"condition_type\": \"quantity\",
    \"condition_value\": \"architecto\",
    \"min_quantity\": 10,
    \"max_quantity\": 100,
    \"material\": \"glossy\",
    \"size\": \"architecto\",
    \"doc_type\": \"architecto\",
    \"price\": 50
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-pricing-rules/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": 1,
    "condition_type": "quantity",
    "condition_value": "architecto",
    "min_quantity": 10,
    "max_quantity": 100,
    "material": "glossy",
    "size": "architecto",
    "doc_type": "architecto",
    "price": 50
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-service-pricing-rules--id-">
</span>
<span id="execution-results-PUTapi-service-pricing-rules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-service-pricing-rules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-service-pricing-rules--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-service-pricing-rules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-service-pricing-rules--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-service-pricing-rules--id-" data-method="PUT"
      data-path="api/service-pricing-rules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-service-pricing-rules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-service-pricing-rules--id-"
                    onclick="tryItOut('PUTapi-service-pricing-rules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-service-pricing-rules--id-"
                    onclick="cancelTryOut('PUTapi-service-pricing-rules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-service-pricing-rules--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/service-pricing-rules/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/service-pricing-rules/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service pricing rule. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="service_id"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="1"
               data-component="body">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>condition_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="condition_type"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="quantity"
               data-component="body">
    <br>
<p>The type of condition for the pricing rule. Example: <code>quantity</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>condition_value</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="condition_value"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_quantity"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="10"
               data-component="body">
    <br>
<p>The minimum quantity for the pricing rule. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_quantity"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="100"
               data-component="body">
    <br>
<p>The maximum quantity for the pricing rule. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>material</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="material"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="glossy"
               data-component="body">
    <br>
<p>The material associated with the pricing rule. Example: <code>glossy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>size</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="size"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>doc_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="doc_type"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-service-pricing-rules--id-"
               value="50"
               data-component="body">
    <br>
<p>The price associated with the pricing rule. Example: <code>50</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-service-pricing-rules--id-">DELETE api/service-pricing-rules/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-service-pricing-rules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/service-pricing-rules/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-pricing-rules/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-service-pricing-rules--id-">
</span>
<span id="execution-results-DELETEapi-service-pricing-rules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-service-pricing-rules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-service-pricing-rules--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-service-pricing-rules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-service-pricing-rules--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-service-pricing-rules--id-" data-method="DELETE"
      data-path="api/service-pricing-rules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-service-pricing-rules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-service-pricing-rules--id-"
                    onclick="tryItOut('DELETEapi-service-pricing-rules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-service-pricing-rules--id-"
                    onclick="cancelTryOut('DELETEapi-service-pricing-rules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-service-pricing-rules--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/service-pricing-rules/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-service-pricing-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-service-pricing-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-service-pricing-rules--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service pricing rule. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-service-consumables">GET api/service-consumables</h2>

<p>
</p>



<span id="example-requests-GETapi-service-consumables">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/service-consumables" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-consumables"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service-consumables">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;service_id&quot;: 2,
        &quot;product_id&quot;: 2,
        &quot;units_per_service&quot;: &quot;2.000&quot;,
        &quot;material&quot;: &quot;glossy&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T18:01:08.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Enmicado&quot;,
            &quot;description&quot;: &quot;Protecci&oacute;n de documentos en mica&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        &quot;product&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Hojas opalina&quot;,
            &quot;description&quot;: &quot;Paquete de 100 hojas opalina&quot;,
            &quot;price&quot;: &quot;120.00&quot;,
            &quot;stock&quot;: 50,
            &quot;category&quot;: &quot;paper&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;service_id&quot;: 1,
        &quot;product_id&quot;: 2,
        &quot;units_per_service&quot;: &quot;1.000&quot;,
        &quot;material&quot;: &quot;opalina&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;service&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        },
        &quot;product&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Hojas opalina&quot;,
            &quot;description&quot;: &quot;Paquete de 100 hojas opalina&quot;,
            &quot;price&quot;: &quot;120.00&quot;,
            &quot;stock&quot;: 50,
            &quot;category&quot;: &quot;paper&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service-consumables" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service-consumables"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service-consumables"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service-consumables" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service-consumables">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service-consumables" data-method="GET"
      data-path="api/service-consumables"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service-consumables', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service-consumables"
                    onclick="tryItOut('GETapi-service-consumables');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service-consumables"
                    onclick="cancelTryOut('GETapi-service-consumables');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service-consumables"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service-consumables</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service-consumables"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service-consumables"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-service-consumables">POST api/service-consumables</h2>

<p>
</p>



<span id="example-requests-POSTapi-service-consumables">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/service-consumables" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"service_id\": 1,
    \"product_id\": 1,
    \"units_per_service\": 2,
    \"material\": \"glossy\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-consumables"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": 1,
    "product_id": 1,
    "units_per_service": 2,
    "material": "glossy"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-service-consumables">
</span>
<span id="execution-results-POSTapi-service-consumables" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-service-consumables"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-service-consumables"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-service-consumables" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-service-consumables">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-service-consumables" data-method="POST"
      data-path="api/service-consumables"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-service-consumables', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-service-consumables"
                    onclick="tryItOut('POSTapi-service-consumables');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-service-consumables"
                    onclick="cancelTryOut('POSTapi-service-consumables');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-service-consumables"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/service-consumables</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-service-consumables"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-service-consumables"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="service_id"                data-endpoint="POSTapi-service-consumables"
               value="1"
               data-component="body">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="POSTapi-service-consumables"
               value="1"
               data-component="body">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>units_per_service</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="units_per_service"                data-endpoint="POSTapi-service-consumables"
               value="2"
               data-component="body">
    <br>
<p>The number of units of the product consumed per service. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>material</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="material"                data-endpoint="POSTapi-service-consumables"
               value="glossy"
               data-component="body">
    <br>
<p>The material associated with the consumable. Example: <code>glossy</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-service-consumables--id-">GET api/service-consumables/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-service-consumables--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/service-consumables/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-consumables/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-service-consumables--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;service_id&quot;: 2,
    &quot;product_id&quot;: 2,
    &quot;units_per_service&quot;: &quot;2.000&quot;,
    &quot;material&quot;: &quot;glossy&quot;,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-29T18:01:08.000000Z&quot;,
    &quot;service&quot;: {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Enmicado&quot;,
        &quot;description&quot;: &quot;Protecci&oacute;n de documentos en mica&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
    },
    &quot;product&quot;: {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Hojas opalina&quot;,
        &quot;description&quot;: &quot;Paquete de 100 hojas opalina&quot;,
        &quot;price&quot;: &quot;120.00&quot;,
        &quot;stock&quot;: 50,
        &quot;category&quot;: &quot;paper&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-service-consumables--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-service-consumables--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-service-consumables--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-service-consumables--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-service-consumables--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-service-consumables--id-" data-method="GET"
      data-path="api/service-consumables/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-service-consumables--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-service-consumables--id-"
                    onclick="tryItOut('GETapi-service-consumables--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-service-consumables--id-"
                    onclick="cancelTryOut('GETapi-service-consumables--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-service-consumables--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/service-consumables/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-service-consumables--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-service-consumables--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-service-consumables--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service consumable. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-service-consumables--id-">PUT api/service-consumables/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-service-consumables--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/service-consumables/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"service_id\": 1,
    \"product_id\": 1,
    \"units_per_service\": 2,
    \"material\": \"glossy\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-consumables/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": 1,
    "product_id": 1,
    "units_per_service": 2,
    "material": "glossy"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-service-consumables--id-">
</span>
<span id="execution-results-PUTapi-service-consumables--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-service-consumables--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-service-consumables--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-service-consumables--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-service-consumables--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-service-consumables--id-" data-method="PUT"
      data-path="api/service-consumables/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-service-consumables--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-service-consumables--id-"
                    onclick="tryItOut('PUTapi-service-consumables--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-service-consumables--id-"
                    onclick="cancelTryOut('PUTapi-service-consumables--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-service-consumables--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/service-consumables/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/service-consumables/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-service-consumables--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-service-consumables--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-service-consumables--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service consumable. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>service_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="service_id"                data-endpoint="PUTapi-service-consumables--id-"
               value="1"
               data-component="body">
    <br>
<p>The ID of the service. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="PUTapi-service-consumables--id-"
               value="1"
               data-component="body">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>units_per_service</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="units_per_service"                data-endpoint="PUTapi-service-consumables--id-"
               value="2"
               data-component="body">
    <br>
<p>The number of units of the product consumed per service. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>material</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="material"                data-endpoint="PUTapi-service-consumables--id-"
               value="glossy"
               data-component="body">
    <br>
<p>The material associated with the consumable. Example: <code>glossy</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-service-consumables--id-">DELETE api/service-consumables/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-service-consumables--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/service-consumables/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/service-consumables/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-service-consumables--id-">
</span>
<span id="execution-results-DELETEapi-service-consumables--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-service-consumables--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-service-consumables--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-service-consumables--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-service-consumables--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-service-consumables--id-" data-method="DELETE"
      data-path="api/service-consumables/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-service-consumables--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-service-consumables--id-"
                    onclick="tryItOut('DELETEapi-service-consumables--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-service-consumables--id-"
                    onclick="cancelTryOut('DELETEapi-service-consumables--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-service-consumables--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/service-consumables/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-service-consumables--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-service-consumables--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-service-consumables--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the service consumable. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-bundles">GET api/bundles</h2>

<p>
</p>



<span id="example-requests-GETapi-bundles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/bundles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-bundles">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Dia de la Madre&quot;,
        &quot;description&quot;: &quot;Paquete especial para el Dia de la Madre&quot;,
        &quot;created_at&quot;: &quot;2025-12-29T20:33:37.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
        &quot;items&quot;: [
            {
                &quot;id&quot;: 5,
                &quot;bundle_id&quot;: 3,
                &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
                &quot;item_id&quot;: 1,
                &quot;quantity&quot;: 2,
                &quot;created_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
                &quot;item&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Impresion&quot;,
                    &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
                    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
                }
            }
        ]
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bundles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bundles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bundles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bundles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bundles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bundles" data-method="GET"
      data-path="api/bundles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bundles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bundles"
                    onclick="tryItOut('GETapi-bundles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bundles"
                    onclick="cancelTryOut('GETapi-bundles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bundles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bundles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bundles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-bundles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-bundles">POST api/bundles</h2>

<p>
</p>



<span id="example-requests-POSTapi-bundles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/bundles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Dia del Padre\",
    \"description\": \"Paquete especial para el Dia del Padre\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Dia del Padre",
    "description": "Paquete especial para el Dia del Padre"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-bundles">
</span>
<span id="execution-results-POSTapi-bundles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-bundles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-bundles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-bundles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-bundles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-bundles" data-method="POST"
      data-path="api/bundles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-bundles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-bundles"
                    onclick="tryItOut('POSTapi-bundles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-bundles"
                    onclick="cancelTryOut('POSTapi-bundles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-bundles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/bundles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-bundles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-bundles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-bundles"
               value="Dia del Padre"
               data-component="body">
    <br>
<p>The name of the bundle. Example: <code>Dia del Padre</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-bundles"
               value="Paquete especial para el Dia del Padre"
               data-component="body">
    <br>
<p>The description of the bundle. Example: <code>Paquete especial para el Dia del Padre</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-bundles--id-">GET api/bundles/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-bundles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/bundles/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundles/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-bundles--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 3,
    &quot;name&quot;: &quot;Dia de la Madre&quot;,
    &quot;description&quot;: &quot;Paquete especial para el Dia de la Madre&quot;,
    &quot;created_at&quot;: &quot;2025-12-29T20:33:37.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
    &quot;items&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;bundle_id&quot;: 3,
            &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
            &quot;item_id&quot;: 1,
            &quot;quantity&quot;: 2,
            &quot;created_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
            &quot;item&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Impresion&quot;,
                &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bundles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bundles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bundles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bundles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bundles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bundles--id-" data-method="GET"
      data-path="api/bundles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bundles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bundles--id-"
                    onclick="tryItOut('GETapi-bundles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bundles--id-"
                    onclick="cancelTryOut('GETapi-bundles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bundles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bundles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bundles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-bundles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-bundles--id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the bundle. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-bundles--id-">PUT api/bundles/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-bundles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/bundles/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Dia de la Madre\",
    \"description\": \"Paquete especial para el Dia de la Madre\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundles/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Dia de la Madre",
    "description": "Paquete especial para el Dia de la Madre"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-bundles--id-">
</span>
<span id="execution-results-PUTapi-bundles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-bundles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-bundles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-bundles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-bundles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-bundles--id-" data-method="PUT"
      data-path="api/bundles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-bundles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-bundles--id-"
                    onclick="tryItOut('PUTapi-bundles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-bundles--id-"
                    onclick="cancelTryOut('PUTapi-bundles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-bundles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/bundles/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/bundles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-bundles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-bundles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-bundles--id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the bundle. Example: <code>3</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-bundles--id-"
               value="Dia de la Madre"
               data-component="body">
    <br>
<p>The name of the bundle. Example: <code>Dia de la Madre</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-bundles--id-"
               value="Paquete especial para el Dia de la Madre"
               data-component="body">
    <br>
<p>The description of the bundle. Example: <code>Paquete especial para el Dia de la Madre</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-bundles--id-">DELETE api/bundles/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-bundles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/bundles/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundles/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-bundles--id-">
</span>
<span id="execution-results-DELETEapi-bundles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-bundles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-bundles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-bundles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-bundles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-bundles--id-" data-method="DELETE"
      data-path="api/bundles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-bundles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-bundles--id-"
                    onclick="tryItOut('DELETEapi-bundles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-bundles--id-"
                    onclick="cancelTryOut('DELETEapi-bundles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-bundles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/bundles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-bundles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-bundles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-bundles--id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the bundle. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-bundle-items">GET api/bundle-items</h2>

<p>
</p>



<span id="example-requests-GETapi-bundle-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/bundle-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundle-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-bundle-items">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 5,
        &quot;bundle_id&quot;: 3,
        &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
        &quot;item_id&quot;: 1,
        &quot;quantity&quot;: 2,
        &quot;created_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
        &quot;bundle&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Dia de la Madre&quot;,
            &quot;description&quot;: &quot;Paquete especial para el Dia de la Madre&quot;,
            &quot;created_at&quot;: &quot;2025-12-29T20:33:37.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;
        },
        &quot;item&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bundle-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bundle-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bundle-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bundle-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bundle-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bundle-items" data-method="GET"
      data-path="api/bundle-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bundle-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bundle-items"
                    onclick="tryItOut('GETapi-bundle-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bundle-items"
                    onclick="cancelTryOut('GETapi-bundle-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bundle-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bundle-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bundle-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-bundle-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-bundle-items">POST api/bundle-items</h2>

<p>
</p>



<span id="example-requests-POSTapi-bundle-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/bundle-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"bundle_id\": 1,
    \"item_type\": \"App\\\\Models\\\\Product\",
    \"item_id\": 2,
    \"quantity\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundle-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bundle_id": 1,
    "item_type": "App\\Models\\Product",
    "item_id": 2,
    "quantity": 3
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-bundle-items">
</span>
<span id="execution-results-POSTapi-bundle-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-bundle-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-bundle-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-bundle-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-bundle-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-bundle-items" data-method="POST"
      data-path="api/bundle-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-bundle-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-bundle-items"
                    onclick="tryItOut('POSTapi-bundle-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-bundle-items"
                    onclick="cancelTryOut('POSTapi-bundle-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-bundle-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/bundle-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-bundle-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-bundle-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bundle_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="bundle_id"                data-endpoint="POSTapi-bundle-items"
               value="1"
               data-component="body">
    <br>
<p>The ID of the bundle. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="item_type"                data-endpoint="POSTapi-bundle-items"
               value="App\Models\Product"
               data-component="body">
    <br>
<p>The type of the item. Example: <code>App\Models\Product</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="item_id"                data-endpoint="POSTapi-bundle-items"
               value="2"
               data-component="body">
    <br>
<p>The ID of the item. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTapi-bundle-items"
               value="3"
               data-component="body">
    <br>
<p>The quantity of the item in the bundle. Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-bundle-items--id-">GET api/bundle-items/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-bundle-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/bundle-items/5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundle-items/5"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-bundle-items--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 5,
    &quot;bundle_id&quot;: 3,
    &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
    &quot;item_id&quot;: 1,
    &quot;quantity&quot;: 2,
    &quot;created_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;,
    &quot;bundle&quot;: {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Dia de la Madre&quot;,
        &quot;description&quot;: &quot;Paquete especial para el Dia de la Madre&quot;,
        &quot;created_at&quot;: &quot;2025-12-29T20:33:37.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T21:02:53.000000Z&quot;
    },
    &quot;item&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Impresion&quot;,
        &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bundle-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bundle-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bundle-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bundle-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bundle-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bundle-items--id-" data-method="GET"
      data-path="api/bundle-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bundle-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bundle-items--id-"
                    onclick="tryItOut('GETapi-bundle-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bundle-items--id-"
                    onclick="cancelTryOut('GETapi-bundle-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bundle-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bundle-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bundle-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-bundle-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-bundle-items--id-"
               value="5"
               data-component="url">
    <br>
<p>The ID of the bundle item. Example: <code>5</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-bundle-items--id-">PUT api/bundle-items/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-bundle-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/bundle-items/5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"bundle_id\": 1,
    \"item_type\": \"App\\\\Models\\\\Product\",
    \"item_id\": 2,
    \"quantity\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundle-items/5"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bundle_id": 1,
    "item_type": "App\\Models\\Product",
    "item_id": 2,
    "quantity": 3
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-bundle-items--id-">
</span>
<span id="execution-results-PUTapi-bundle-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-bundle-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-bundle-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-bundle-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-bundle-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-bundle-items--id-" data-method="PUT"
      data-path="api/bundle-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-bundle-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-bundle-items--id-"
                    onclick="tryItOut('PUTapi-bundle-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-bundle-items--id-"
                    onclick="cancelTryOut('PUTapi-bundle-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-bundle-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/bundle-items/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/bundle-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-bundle-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-bundle-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-bundle-items--id-"
               value="5"
               data-component="url">
    <br>
<p>The ID of the bundle item. Example: <code>5</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bundle_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="bundle_id"                data-endpoint="PUTapi-bundle-items--id-"
               value="1"
               data-component="body">
    <br>
<p>The ID of the bundle. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="item_type"                data-endpoint="PUTapi-bundle-items--id-"
               value="App\Models\Product"
               data-component="body">
    <br>
<p>The type of the item. Example: <code>App\Models\Product</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="item_id"                data-endpoint="PUTapi-bundle-items--id-"
               value="2"
               data-component="body">
    <br>
<p>The ID of the item. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="PUTapi-bundle-items--id-"
               value="3"
               data-component="body">
    <br>
<p>The quantity of the item in the bundle. Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-bundle-items--id-">DELETE api/bundle-items/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-bundle-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/bundle-items/5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/bundle-items/5"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-bundle-items--id-">
</span>
<span id="execution-results-DELETEapi-bundle-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-bundle-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-bundle-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-bundle-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-bundle-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-bundle-items--id-" data-method="DELETE"
      data-path="api/bundle-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-bundle-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-bundle-items--id-"
                    onclick="tryItOut('DELETEapi-bundle-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-bundle-items--id-"
                    onclick="cancelTryOut('DELETEapi-bundle-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-bundle-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/bundle-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-bundle-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-bundle-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-bundle-items--id-"
               value="5"
               data-component="url">
    <br>
<p>The ID of the bundle item. Example: <code>5</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-customers">GET api/customers</h2>

<p>
</p>



<span id="example-requests-GETapi-customers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/customers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/customers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-customers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Juan P&eacute;rez&quot;,
        &quot;phone&quot;: &quot;555-1234&quot;,
        &quot;email&quot;: &quot;juan@example.com&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;orders&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;customer_id&quot;: 1,
                &quot;total&quot;: &quot;100.00&quot;,
                &quot;status&quot;: &quot;pending&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Mar&iacute;a L&oacute;pez&quot;,
        &quot;phone&quot;: &quot;555-5678&quot;,
        &quot;email&quot;: &quot;maria@example.com&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;orders&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;customer_id&quot;: 2,
                &quot;total&quot;: &quot;200.00&quot;,
                &quot;status&quot;: &quot;completed&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
            }
        ]
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-customers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-customers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-customers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-customers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-customers" data-method="GET"
      data-path="api/customers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-customers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-customers"
                    onclick="tryItOut('GETapi-customers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-customers"
                    onclick="cancelTryOut('GETapi-customers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-customers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/customers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-customers">POST api/customers</h2>

<p>
</p>



<span id="example-requests-POSTapi-customers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/customers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Juan Perez\",
    \"phone\": \"+1234567890\",
    \"email\": \"juanperez@mail.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/customers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Juan Perez",
    "phone": "+1234567890",
    "email": "juanperez@mail.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-customers">
</span>
<span id="execution-results-POSTapi-customers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-customers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-customers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-customers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-customers" data-method="POST"
      data-path="api/customers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-customers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-customers"
                    onclick="tryItOut('POSTapi-customers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-customers"
                    onclick="cancelTryOut('POSTapi-customers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-customers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/customers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-customers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-customers"
               value="Juan Perez"
               data-component="body">
    <br>
<p>The name of the customer. Example: <code>Juan Perez</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-customers"
               value="+1234567890"
               data-component="body">
    <br>
<p>The phone number of the customer. Example: <code>+1234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-customers"
               value="juanperez@mail.com"
               data-component="body">
    <br>
<p>The email address of the customer. Example: <code>juanperez@mail.com</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-customers--id-">GET api/customers/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-customers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/customers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/customers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-customers--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Juan P&eacute;rez&quot;,
    &quot;phone&quot;: &quot;555-1234&quot;,
    &quot;email&quot;: &quot;juan@example.com&quot;,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;orders&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;customer_id&quot;: 1,
            &quot;total&quot;: &quot;100.00&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-customers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-customers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-customers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-customers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-customers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-customers--id-" data-method="GET"
      data-path="api/customers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-customers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-customers--id-"
                    onclick="tryItOut('GETapi-customers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-customers--id-"
                    onclick="cancelTryOut('GETapi-customers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-customers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/customers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-customers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the customer. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-customers--id-">PUT api/customers/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-customers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/customers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Juan Perez 2\",
    \"phone\": \"+1234567890\",
    \"email\": \"juanperez2@mail.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/customers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Juan Perez 2",
    "phone": "+1234567890",
    "email": "juanperez2@mail.com"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-customers--id-">
</span>
<span id="execution-results-PUTapi-customers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-customers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-customers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-customers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-customers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-customers--id-" data-method="PUT"
      data-path="api/customers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-customers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-customers--id-"
                    onclick="tryItOut('PUTapi-customers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-customers--id-"
                    onclick="cancelTryOut('PUTapi-customers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-customers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/customers/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/customers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-customers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the customer. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-customers--id-"
               value="Juan Perez 2"
               data-component="body">
    <br>
<p>The name of the customer. Example: <code>Juan Perez 2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-customers--id-"
               value="+1234567890"
               data-component="body">
    <br>
<p>The phone number of the customer. Example: <code>+1234567890</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-customers--id-"
               value="juanperez2@mail.com"
               data-component="body">
    <br>
<p>The email address of the customer. Example: <code>juanperez2@mail.com</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-customers--id-">DELETE api/customers/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-customers--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/customers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/customers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-customers--id-">
</span>
<span id="execution-results-DELETEapi-customers--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-customers--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-customers--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-customers--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-customers--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-customers--id-" data-method="DELETE"
      data-path="api/customers/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-customers--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-customers--id-"
                    onclick="tryItOut('DELETEapi-customers--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-customers--id-"
                    onclick="cancelTryOut('DELETEapi-customers--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-customers--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/customers/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-customers--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-customers--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the customer. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-orders">GET api/orders</h2>

<p>
</p>



<span id="example-requests-GETapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;customer_id&quot;: 1,
        &quot;total&quot;: &quot;100.00&quot;,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;customer&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Juan P&eacute;rez&quot;,
            &quot;phone&quot;: &quot;555-1234&quot;,
            &quot;email&quot;: &quot;juan@example.com&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        &quot;items&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;order_id&quot;: 1,
                &quot;item_type&quot;: &quot;App\\Models\\Product&quot;,
                &quot;item_id&quot;: 1,
                &quot;quantity&quot;: 1,
                &quot;unit_price&quot;: &quot;80.00&quot;,
                &quot;meta&quot;: null,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;item&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Lapiz #10&quot;,
                    &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
                    &quot;price&quot;: &quot;6.00&quot;,
                    &quot;stock&quot;: 14,
                    &quot;category&quot;: &quot;prod&quot;,
                    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-12-29T21:13:06.000000Z&quot;
                }
            }
        ]
    },
    {
        &quot;id&quot;: 2,
        &quot;customer_id&quot;: 2,
        &quot;total&quot;: &quot;200.00&quot;,
        &quot;status&quot;: &quot;completed&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;customer&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Mar&iacute;a L&oacute;pez&quot;,
            &quot;phone&quot;: &quot;555-5678&quot;,
            &quot;email&quot;: &quot;maria@example.com&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        &quot;items&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;order_id&quot;: 2,
                &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
                &quot;item_id&quot;: 1,
                &quot;quantity&quot;: 50,
                &quot;unit_price&quot;: &quot;4.00&quot;,
                &quot;meta&quot;: null,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;item&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Impresion&quot;,
                    &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
                    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
                }
            }
        ]
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders" data-method="GET"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders"
                    onclick="tryItOut('GETapi-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders"
                    onclick="cancelTryOut('GETapi-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-orders">POST api/orders</h2>

<p>
</p>



<span id="example-requests-POSTapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"customer_id\": 1,
    \"total\": 150.75,
    \"status\": \"pending\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "customer_id": 1,
    "total": 150.75,
    "status": "pending"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-orders">
</span>
<span id="execution-results-POSTapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-orders" data-method="POST"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-orders"
                    onclick="tryItOut('POSTapi-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-orders"
                    onclick="cancelTryOut('POSTapi-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="customer_id"                data-endpoint="POSTapi-orders"
               value="1"
               data-component="body">
    <br>
<p>The ID of the customer placing the order. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total"                data-endpoint="POSTapi-orders"
               value="150.75"
               data-component="body">
    <br>
<p>The total amount of the order. Example: <code>150.75</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-orders"
               value="pending"
               data-component="body">
    <br>
<p>The status of the order. Example: <code>pending</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-orders--id-">GET api/orders/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;customer_id&quot;: 1,
    &quot;total&quot;: &quot;100.00&quot;,
    &quot;status&quot;: &quot;pending&quot;,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;customer&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Juan P&eacute;rez&quot;,
        &quot;phone&quot;: &quot;555-1234&quot;,
        &quot;email&quot;: &quot;juan@example.com&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
    },
    &quot;items&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;order_id&quot;: 1,
            &quot;item_type&quot;: &quot;App\\Models\\Product&quot;,
            &quot;item_id&quot;: 1,
            &quot;quantity&quot;: 1,
            &quot;unit_price&quot;: &quot;80.00&quot;,
            &quot;meta&quot;: null,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;item&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lapiz #10&quot;,
                &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
                &quot;price&quot;: &quot;6.00&quot;,
                &quot;stock&quot;: 14,
                &quot;category&quot;: &quot;prod&quot;,
                &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-12-29T21:13:06.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders--id-" data-method="GET"
      data-path="api/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders--id-"
                    onclick="tryItOut('GETapi-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders--id-"
                    onclick="cancelTryOut('GETapi-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-orders--id-">PUT api/orders/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"customer_id\": 1,
    \"total\": 150.75,
    \"status\": \"pending\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "customer_id": 1,
    "total": 150.75,
    "status": "pending"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-orders--id-">
</span>
<span id="execution-results-PUTapi-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-orders--id-" data-method="PUT"
      data-path="api/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-orders--id-"
                    onclick="tryItOut('PUTapi-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-orders--id-"
                    onclick="cancelTryOut('PUTapi-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/orders/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="customer_id"                data-endpoint="PUTapi-orders--id-"
               value="1"
               data-component="body">
    <br>
<p>The ID of the customer placing the order. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total"                data-endpoint="PUTapi-orders--id-"
               value="150.75"
               data-component="body">
    <br>
<p>The total amount of the order. Example: <code>150.75</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-orders--id-"
               value="pending"
               data-component="body">
    <br>
<p>The status of the order. Example: <code>pending</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-orders--id-">DELETE api/orders/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-orders--id-">
</span>
<span id="execution-results-DELETEapi-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-orders--id-" data-method="DELETE"
      data-path="api/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-orders--id-"
                    onclick="tryItOut('DELETEapi-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-orders--id-"
                    onclick="cancelTryOut('DELETEapi-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-order-items">GET api/order-items</h2>

<p>
</p>



<span id="example-requests-GETapi-order-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/order-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/order-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-order-items">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;order_id&quot;: 1,
        &quot;item_type&quot;: &quot;App\\Models\\Product&quot;,
        &quot;item_id&quot;: 1,
        &quot;quantity&quot;: 1,
        &quot;unit_price&quot;: &quot;80.00&quot;,
        &quot;meta&quot;: null,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;order&quot;: {
            &quot;id&quot;: 1,
            &quot;customer_id&quot;: 1,
            &quot;total&quot;: &quot;100.00&quot;,
            &quot;status&quot;: &quot;pending&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        &quot;item&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Lapiz #10&quot;,
            &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
            &quot;price&quot;: &quot;6.00&quot;,
            &quot;stock&quot;: 14,
            &quot;category&quot;: &quot;prod&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-29T21:13:06.000000Z&quot;
        }
    },
    {
        &quot;id&quot;: 2,
        &quot;order_id&quot;: 2,
        &quot;item_type&quot;: &quot;App\\Models\\Service&quot;,
        &quot;item_id&quot;: 1,
        &quot;quantity&quot;: 50,
        &quot;unit_price&quot;: &quot;4.00&quot;,
        &quot;meta&quot;: null,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;order&quot;: {
            &quot;id&quot;: 2,
            &quot;customer_id&quot;: 2,
            &quot;total&quot;: &quot;200.00&quot;,
            &quot;status&quot;: &quot;completed&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
        },
        &quot;item&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Impresion&quot;,
            &quot;description&quot;: &quot;Servicios de impresion de documentos&quot;,
            &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-12-30T04:45:42.000000Z&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-order-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-order-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-order-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-items" data-method="GET"
      data-path="api/order-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-items"
                    onclick="tryItOut('GETapi-order-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-items"
                    onclick="cancelTryOut('GETapi-order-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-order-items">POST api/order-items</h2>

<p>
</p>



<span id="example-requests-POSTapi-order-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8081/api/order-items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"order_id\": 1,
    \"item_type\": \"App\\\\Models\\\\Product\",
    \"item_id\": 2,
    \"quantity\": 3,
    \"unit_price\": 29.99
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/order-items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": 1,
    "item_type": "App\\Models\\Product",
    "item_id": 2,
    "quantity": 3,
    "unit_price": 29.99
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-order-items">
</span>
<span id="execution-results-POSTapi-order-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-order-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-order-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-order-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-order-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-order-items" data-method="POST"
      data-path="api/order-items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-order-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-order-items"
                    onclick="tryItOut('POSTapi-order-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-order-items"
                    onclick="cancelTryOut('POSTapi-order-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-order-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/order-items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-order-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-order-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="POSTapi-order-items"
               value="1"
               data-component="body">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="item_type"                data-endpoint="POSTapi-order-items"
               value="App\Models\Product"
               data-component="body">
    <br>
<p>The type of the item. Example: <code>App\Models\Product</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="item_id"                data-endpoint="POSTapi-order-items"
               value="2"
               data-component="body">
    <br>
<p>The ID of the item. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTapi-order-items"
               value="3"
               data-component="body">
    <br>
<p>The quantity of the item in the order. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="unit_price"                data-endpoint="POSTapi-order-items"
               value="29.99"
               data-component="body">
    <br>
<p>The unit price of the item. Example: <code>29.99</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-order-items--id-">GET api/order-items/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-order-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8081/api/order-items/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/order-items/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-order-items--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;order_id&quot;: 1,
    &quot;item_type&quot;: &quot;App\\Models\\Product&quot;,
    &quot;item_id&quot;: 1,
    &quot;quantity&quot;: 1,
    &quot;unit_price&quot;: &quot;80.00&quot;,
    &quot;meta&quot;: null,
    &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
    &quot;order&quot;: {
        &quot;id&quot;: 1,
        &quot;customer_id&quot;: 1,
        &quot;total&quot;: &quot;100.00&quot;,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;
    },
    &quot;item&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Lapiz #10&quot;,
        &quot;description&quot;: &quot;Eius et animi quos velit et.&quot;,
        &quot;price&quot;: &quot;6.00&quot;,
        &quot;stock&quot;: 14,
        &quot;category&quot;: &quot;prod&quot;,
        &quot;created_at&quot;: &quot;2025-12-23T17:02:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-12-29T21:13:06.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-order-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-order-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-order-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-order-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-order-items--id-" data-method="GET"
      data-path="api/order-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-order-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-order-items--id-"
                    onclick="tryItOut('GETapi-order-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-order-items--id-"
                    onclick="cancelTryOut('GETapi-order-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-order-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/order-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-order-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-order-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-order-items--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order item. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-order-items--id-">PUT api/order-items/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-order-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8081/api/order-items/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"order_id\": \"architecto\",
    \"item_type\": \"architecto\",
    \"item_id\": 16,
    \"quantity\": 22,
    \"unit_price\": 4326.41688
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/order-items/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "order_id": "architecto",
    "item_type": "architecto",
    "item_id": 16,
    "quantity": 22,
    "unit_price": 4326.41688
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-order-items--id-">
</span>
<span id="execution-results-PUTapi-order-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-order-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-order-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-order-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-order-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-order-items--id-" data-method="PUT"
      data-path="api/order-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-order-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-order-items--id-"
                    onclick="tryItOut('PUTapi-order-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-order-items--id-"
                    onclick="cancelTryOut('PUTapi-order-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-order-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/order-items/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/order-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-order-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-order-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-order-items--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order item. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="PUTapi-order-items--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the orders table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="item_type"                data-endpoint="PUTapi-order-items--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>item_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="item_id"                data-endpoint="PUTapi-order-items--id-"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="PUTapi-order-items--id-"
               value="22"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>22</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="unit_price"                data-endpoint="PUTapi-order-items--id-"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-order-items--id-">DELETE api/order-items/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-order-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8081/api/order-items/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8081/api/order-items/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-order-items--id-">
</span>
<span id="execution-results-DELETEapi-order-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-order-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-order-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-order-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-order-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-order-items--id-" data-method="DELETE"
      data-path="api/order-items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-order-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-order-items--id-"
                    onclick="tryItOut('DELETEapi-order-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-order-items--id-"
                    onclick="cancelTryOut('DELETEapi-order-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-order-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/order-items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-order-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-order-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-order-items--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order item. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
