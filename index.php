<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Battery Selector</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Six+Caps&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Battery Selector Tool for OEMs - Triathlon Battery Solutions, Inc.">
        <link rel="apple-touch-icon" sizes="180x180" href="images/triathlonlogo.png">
        <link rel="icon" type="image/png" href="images/triathlonlogo.png">
        <meta property="og:url" content="https://triathlon-batteries-usa.com">
        <meta property="og:title" content="Triathlon Battery Selector">
        <meta property="og:description" content="Battery Selector Tool for OEMs - Triathlon Battery Solutions, Inc.">
        <meta property="og:image" content="https://triathlon-batteries-usa.com/images/moreflexible.jpg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">
        <meta property="og:image:alt" content="more flexible batteries">
        <meta property="og:type" content="article">
        <meta name="twitter:card" content="triathlon_batteries">
        <meta name="twitter:site:id" content="@triathlonbatt">
        <link href="styles/styles.css?v=<?=time();?>" rel="stylesheet" type="text/css">
    </head>
    <body>
        <main class="index">
            <header>
                <div class="hamburger">
                    <svg viewbox="0 0 32 32">
                        <use xlink:href="#hamburger-menu" />
                    </svg>
                </div>
                <nav>
                    <ul class="tabs">
                        <li class="tab">
                            <a class="logo tooltip" href="https://www.triathlon-batteries.com/">
                                <img src="images/logowhite.png" alt="Triathlon Intelligent Batteries">
                                <span class="tooltiptext">Triathlon Batteries Home</span>
                            </a>
                        </li>
                        <li class="tab"><a class="active" href="">Battery</a></li>
                        <li class="tab"><a class="inactive" href="charger.php">Charger</a></li>
                        <li class="tab"><a class="inactive" href="contact-us.html">Contact Us</a></li>
                    </ul>
                    <div class="close">
                        <svg viewbox="0 0 32 32">
                            <use xlink:href="#close-icon"/>
                        </svg>
                    </div>
                </nav>
            </header>
            <a class="overlay" href="https://www.triathlon-batteries.com/">
                <img src="images/logowhite.png" alt="Triathlon Intelligent Batteries">
            </a>
            <div class="selector">
                <h1>Battery Selector</h1>
                <div id="selectorContainer">
                    <div class="dropdowns">
                        <label for="manufacturer">Manufacturer</label>
                        <select id="manufacturer" v-model='manufacturer' @change='getManufacturerVolt()'>
                            <option value='0'>Select Manufacturer</option>
                            <option v-for='data in manufacturers' :value='data.manufacturer'>{{ data.manufacturer }}</option>
                        </select>

                        <label for="volt">Voltage</label>
                        <select id="volt" v-model='volt' @change='getVoltModel()'>
                            <option value='0'>Select Voltage</option>
                            <option v-for='data in volts' :value='data.volt'>{{ data.volt }}<span> V</span></option>
                        </select>

                        <label for="model">Model</label>
                        <select id="model" v-model='model' @change='getModelSize()'>
                            <option value='0'>Select Model</option>
                            <option v-for='data in models' :value='data.model'>{{ data.model }}</option>
                        </select>

                        <label for="size">Compartment Size</label>
                        <select id="size" v-model='size' @change='getSizeBattery()'>
                            <option value='0'>Select Compartment Size</option>
                            <option v-for='data in sizes' :value='data.size'>{{ data.size }}</option>
                        </select>

                        <label for="battery">Battery Description</label>
                        <select id="battery" v-model='battery' @change='getSelectedItems(); getBatteryCharger();'>
                            <option value='0'>Select Battery</option>
                            <option v-for='data in batteries' :value='data.battery'>{{ data.battery }}</option>
                        </select>

                        <label for="charger">Charger (optional)</label>
                        <select id="charger" v-model='charger' @change='getChargerItems()'>
                            <option class="charger" value='0'>Select Charger</option>
                            <option v-for='data in chargers' :value='data.charger'>{{ data.charger }}</option>
                        </select>
                    </div>
                    <h2>Battery<span class="hidden">/Charger</span> Specifications:</h2>
                    <div class="allspecs">
                        <div class="batteryhidden">
                            <h3>Battery:</h3>
                            <div class="specs">
                                <label for="connector">Truck Connector and Min Weight:</label>
                                <label id="connector" v-if="selecteditems && selecteditems.length">{{ selecteditems[0].connectorinfo }}<span>.</span></label>
                                <label id="connector" v-else></label>

                                <label for="amphours">Amp Hours:</label>
                                <label id="amphours" v-if="selecteditems && selecteditems.length">{{ selecteditems[1].amphours }}<span> Ah</span></label>
                                <label id="amphours" v-else></label>

                                <label for="kilowatthours">Kilowatt Hours:</label>
                                <label id="kilowatthours" v-if="selecteditems && selecteditems.length">{{ selecteditems[2].kilowatthours }}<span> kWh</span></label>
                                <label id="kilowatthours" v-else></label>

                                <label for="length">Length:</label>
                                <label id="length" v-if="selecteditems && selecteditems.length">{{ selecteditems[3].length }}<span> in.</span></label>
                                <label id="length" v-else></label>

                                <label for="width">Width:</label>
                                <label id="width" v-if="selecteditems && selecteditems.length">{{ selecteditems[4].width }}<span> in.</span></label>
                                <label id="width" v-else></label>

                                <label for="height">Height:</label>
                                <label id="height" v-if="selecteditems && selecteditems.length">{{ selecteditems[5].height }}<span> in.</span></label>
                                <label id="height" v-else></label>

                                <label for="traynumber">Tray Number:</label>
                                <label id="traynumber" v-if="selecteditems && selecteditems.length">{{ selecteditems[6].traynumber }}</label>
                                <label id="traynumber" v-else></label>

                                <label for="weightlbs">Battery Weight:</label>
                                <label id="weightlbs" v-if="selecteditems && selecteditems.length">{{ selecteditems[7].weightlbs }}<span> lbs.</span></label>
                                <label id="weightlbs" v-else></label>

                                <label for="cover">Cover:</label>
                                <label id="cover" v-if="selecteditems && selecteditems.length">{{ selecteditems[8].cover }}</label>
                                <label id="cover" v-else></label>
                            </div>
                        </div>
                        <div class="chargerhidden">
                            <h3>Charger:</h3>
                            <div class="chargerspecs">
                                <label>Charger Type:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[0].chargertype }}</label>
                                <label v-else></label>

                                <label>Charge Rate:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[1].chargerate }}<span> A</span></label>
                                <label v-else></label>

                                <label>VAC Input:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[2].vacinput }}<span> V</span></label>
                                <label v-else></label>

                                <label>Phase:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[3].phase }}</label>
                                <label v-else></label>

                                <label>AC Input:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[4].acinput }}<span> A</span></label>
                                <label v-else></label>

                                <label>Weight:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[5].chargerweight }}<span> lbs.</span></label>
                                <label v-else></label>

                                <label>Cabinet:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[6].cabinet }}</label>
                                <label v-else></label>

                                <label>Charger Width:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[7].chargerwidth }}<span> in.</span></label>
                                <label v-else></label>

                                <label>Charger Depth:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[8].chargerdepth }}<span> in.</span></label>
                                <label v-else></label>

                                <label>Charger Height:</label>
                                <label v-if="chargeritems && chargeritems.length">{{ chargeritems[9].chargerheight }}<span> in.</span></label>
                                <label v-else></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="disclaimer">
                    DISCLAIMER: Restraints should be used to prohibit movement of the installed battery to no more than 1/2" in any direction. 
                    Battery dimensions are +/- 1/16". Battery weights may vary +/- 5%. Counterweights can be added to the battery if the service 
                    weight of the battery is less than the minimum weight required. This information is subject to change based on notice from 
                    suppliers or Triathlon needs. Triathlon expressly denies any responsibility for the accuracy of this information. Triathlon 
                    disclaims any warranties, expressed or implied, for the accuracy of this information. Triathlon denies any liability for damages 
                    following use of this information.
                </div>
            </div>
        </main>
        <svg class="svg-info" xmlns="http://www.w3.org/2000/svg">
            <symbol id="hamburger-menu">
                <path d="M4 10h24a2 2 0 000-4H4a2 2 0 000 4zm24 4H4a2 2 0 000 4h24a2 2 0 000-4zm0 8H4a2 2 0 000 4h24a2 2 0 000-4z" />
            </symbol>
            <symbol id="close-icon">
                <g>
                    <path stroke="null" d="M28.703 25.14L19.563 16l9.14-9.14a2.513 2.513 0 000-3.563 2.513 2.513 0 00-3.563 0L16 12.437l-9.14-9.14a2.513 2.513 0 00-3.563 0 2.513 2.513 0 000 3.563l9.14 9.14-9.14 9.14a2.513 2.513 0 000 3.563 2.513 2.513 0 003.563 0l9.14-9.14 9.14 9.14a2.513 2.513 0 003.563 0c.98-.987.98-2.583 0-3.563z" />
                </g>
            </symbol>
        </svg>
        <script src="js/vue.js"></script>
        <script src="axios-master/dist/axios.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/battery.js"></script>
        <script type="text/javascript" src="js/customjquery.js"></script>
    </body>
</html>