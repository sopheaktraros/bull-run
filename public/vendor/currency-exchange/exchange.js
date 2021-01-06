(function() {

        this.cx = {
            options: {},
            result: {},

            settings: function(options) {
                this.options = options;

                return this;
            },

            convert: function(amount, reverse) {
                var options = this.options;

                this.reverse = (typeof reverse != 'undefined' ? reverse : false);

                if( typeof options.to == undefined || typeof options == undefined ) {
                    return false;
                }

                var result = 0;

                if(options.to == 'USD') {
                    this.result.rate_from = options.rates[options.from].sell_usd;
                    this.result.rate_from_type = 'buy';
                    this.result.rate_to = options.rates[options.to].buy_usd;
                    this.result.rate_to_type = 'sell';
                    
                    result= this.sellUSD(amount, options.rates[options.from].sell_usd, this.reverse);
                } else if(options.from == 'USD') {
                    this.result.rate_from =  options.rates[options.from].sell_usd;
                    this.result.rate_from_type = 'buy';
                    this.result.rate_to =  options.rates[options.to].buy_usd;
                    this.result.rate_to_type = 'sell';

                    result = this.buyUSD(amount, options.rates[options.to].buy_usd, this.reverse);
                } else {
                    this.result.rate_from = options.rates[options.from].sell_usd;
                    this.result.rate_from_type = 'buy';
                    this.result.rate_to = options.rates[options.to].buy_usd;
                    this.result.rate_to_type = 'sell';

                    if(this.reverse == true) {
                        var amountUSD = this.sellUSD(amount, options.rates[options.to].sell_usd);
                        result = this.buyUSD(amountUSD, options.rates[options.from].buy_usd);
                    } else {
                        var amountUSD = this.sellUSD(amount, options.rates[options.from].sell_usd);
                        result = this.buyUSD(amountUSD, options.rates[options.to].buy_usd);
                    }
                }

                if(this.reverse == true) {
                    this.result.amount = amount;
                    this.result.value = result;
                } else {
                    this.result.amount = result;
                    this.result.value = amount;
                }
                
                this.result.rate = this.result.amount / this.result.value;

                return this.result;
            },

            buyUSD: function (amount, rate, reverse) {
                if (reverse == true) {
                    return (parseFloat(amount) / parseFloat(rate));
                }
    
                return (parseFloat(amount) * parseFloat(rate));
            },
    
            sellUSD: function (amount, rate, reverse) {
                if (reverse == true) {
                    return (parseFloat(amount) * parseFloat(rate));
                }
    
                return (parseFloat(amount) / parseFloat(rate));
            },

            decimalDigits: function(currency) {
                var lowest_amount = parseFloat(this.options.rates[currency].lowest_amount);

                var digits = 2;
                
                if(lowest_amount <= 0.009) {
                    digits = 4;
                } else if(lowest_amount >= 1) {
                    digits = 0;
                } else  if(lowest_amount >= 0.1) {
                    digits = 1;
                }

                return digits;
            },

            roundUp: function(amount, currency) {
                var amount = this.unformatCurrency(amount, currency);
                var lowest_amount = parseFloat(this.options.rates[currency].lowest_amount);
                var amountInt = parseInt(amount);
                var amountTrail = 0;

                if(lowest_amount == 0) {
                    return amount;  
                } else if(lowest_amount >= 1) {
                    amountTrail = amountInt % lowest_amount; 
                    
                    if(amountTrail < 1) {
                        amount = amountInt;
                    } else if(amountTrail < 40) {
                        amount = amount - amountTrail;
                    } else {
                        amount = (amount - amountTrail) + lowest_amount;
                    }
                }

                return accounting.toFixed(amount, this.decimalDigits(currency));
            },

            roundDown: function(amount, currency) {
                var amount = this.unformatCurrency(amount, currency);
                var lowest_amount = parseFloat(this.options.rates[currency].lowest_amount);
                var amountInt = parseInt(amount);
                var amountTrail = 0;

                if(lowest_amount == 0) {
                    return amount;
                }else if(lowest_amount >= 1) {
                    amountTrail += amountInt % 100;
                    if(amountTrail < lowest_amount) {
                        amount = amountInt - amountTrail;
                    }
                } else if(lowest_amount > 0) {
                    amountTrail =  amount - amountInt;
                    if(amountTrail < lowest_amount) {
                        amount = amountInt;
                    }
                }

                return amount;
            },

            formatCurrency: function(amount, currency, fixed) {
                var lowest_amount = this.options.rates[currency].lowest_amount;
                var amount = parseFloat((amount.toString()).replace(/,/g,''));

                return accounting.formatMoney(amount, "", this.decimalDigits(currency));
            },

            unformatCurrency: function(amount) {
                return parseFloat(amount.replace(/,/g,''));
            }

        };
    
    }(this));