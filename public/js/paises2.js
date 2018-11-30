function ajaxCall2() {
    this.send = function(data, url, method, success, type) {
        type = type||'json';
        var successRes = function(data) {
            success(data);
        }

        var errorRes = function(e) {
            console.log(e);
            //alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
            //jQuery('#loader').modal('hide');
        }
        jQuery.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 60000
        });

    }

}

function locationInfo2() {
    var rootUrl = "//geodata.solutions/api/api.php";
    //set default values
    var username = 'demo';
    var ordering = 'name';
    //now check for set values
    var addParams = '';
    if(jQuery("#gds_appid").length > 0) {
        addParams += '&appid=' + jQuery("#gds_appid").val();
    }
    if(jQuery("#gds_hash").length > 0) {
        addParams += '&hash=' + jQuery("#gds_hash").val();
    }

    var call = new ajaxCall2();

    this.confCity = function(id) {
     //   console.log(id);
     //   console.log('started');
        var url = rootUrl+'?type=confCity&countryId='+ jQuery('#countryId2 option:selected').attr('countryid2') +'&stateId=' + jQuery('#stateId2 option:selected').attr('stateid2') + '&cityId=' + id;
        var method = "post";
        var data = {};
        call.send(data, url, method, function(data) {
            if(data){
                //    alert(data);
            }
            else{
                //   alert('No data');
            }
        });
    };


    this.getCities = function(id) {
        jQuery(".cities2 option:gt(0)").remove();
        //get additional fields
        var stateClasses = jQuery('#cityId2').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl+'?type=getCities&countryId='+ jQuery('#countryId2 option:selected').attr('countryid2') +'&stateId=' + id + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.cities2').find("option:eq(0)").html("Por favor espere..");
        call.send(data, url, method, function(data) {
            jQuery('.cities2').find("option:eq(0)").html("Seleccione ciudad de explotación");
            if(data.tp == 1){
                if(data.hits > 500)
                {
                    //alert('Free usage far exceeded. Please subscribe at geodata.solutions.');
                    console.log('Daily geodata.solutions hit count:' + data.hits);
                }
                else
                {
                    console.log('Daily geodata.solutions hit count:' + data.hits)
                }

                var listlen = Object.keys(data['result']).length;

                if(listlen > 0)
                {
                    jQuery.each(data['result'], function(key, val) {

                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        jQuery('.cities2').append(option);
                    });
                }
                else
                {
                    var usestate = jQuery('#stateId2 option:selected').val();
                    var option = jQuery('<option />');
                    option.attr('value', usestate).text(usestate);
                    option.attr('selected', 'selected');
                    jQuery('.cities2').append(option);
                }

                jQuery(".cities2").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getStates = function(id) {
        jQuery(".states2 option:gt(0)").remove();
        jQuery(".cities2 option:gt(0)").remove();
        //get additional fields
        var stateClasses = jQuery('#stateId2').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl+'?type=getStates&countryId=' + id + addParams  + addClasses;
        var method = "post";
        var data = {};
        jQuery('.states2').find("option:eq(0)").html("Por favor espere..");
        call.send(data, url, method, function(data) {
            jQuery('.states2').find("option:eq(0)").html("Seleccione provincia de explotación");
            if(data.tp == 1){
                if(data.hits > 500)
                {
                    //alert('Free usage far exceeded. Please subscribe at geodata.solutions.');
                    console.log('Daily geodata.solutions hit count:' + data.hits);
                }
                else
                {
                    console.log('Daily geodata.solutions hit count:' + data.hits)
                }
                jQuery.each(data['result'], function(key, val) {
                    var option = jQuery('<option />');
                    option.attr('value', val).text(val);
                    option.attr('stateid2', key);
                    jQuery('.states2').append(option);
                });
                jQuery(".states2").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getCountries = function() {
        //get additional fields
        var countryClasses = jQuery('#countryId2').attr('class');

        var cC = countryClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }

        var presel = false;
        var iip = 'N';
        jQuery.each(cC, function( index, value ) {
            if (value.match("^presel-")) {
                presel = value.substring(7);

            }
            if(value.match("^presel-byi"))
            {
                var iip = 'Y';
            }
        });


        var url = rootUrl+'?type=getCountries' + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.countries2').find("option:eq(0)").html("Por favor espere..");
        call.send(data, url, method, function(data) {
            jQuery('.countries2').find("option:eq(0)").html("Seleccione país de explotación");

            if(data.tp == 1){
                if(data.hits > 500)
                {
                    //alert('Free usage far exceeded. Please subscribe at geodata.solutions.');
                    console.log('Daily geodata.solutions hit count:' + data.hits);
                }
                else
                {
                    console.log('Daily geodata.solutions hit count:' + data.hits)
                }
                if(presel == 'byip')
                {
                    presel = data['presel'];
                    console.log('2 presel is set as ' + presel);
                }


                if(jQuery.inArray("group-continents",cC) > -1)
                {
                    var $select = jQuery('.countries2');
                    console.log(data['result']);
                    jQuery.each(data['result'], function(i, optgroups) {
                        var $optgroup = jQuery("<optgroup>", {label: i});
                        if(optgroups.length > 0)
                        {
                            $optgroup.appendTo($select);
                        }

                        jQuery.each(optgroups, function(groupName, options) {
                            var coption = jQuery('<option />');
                            coption.attr('value', options.name).text(options.name);
                            coption.attr('countryid2', options.id);
                            if(presel) {
                                if (presel.toUpperCase() == options.id) {
                                    coption.attr('selected', 'selected');
                                }
                            }
                            coption.appendTo($optgroup);
                        });
                    });
                }
                else
                {
                    jQuery.each(data['result'], function(key, val) {
                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        option.attr('countryid2', key);
                        if(presel)
                        {
                            if(presel.toUpperCase() ==  key)
                            {
                                option.attr('selected', 'selected');
                            }
                        }
                        jQuery('.countries2').append(option);
                    });
                }
                if(presel)
                {
                    jQuery('.countries2').trigger('change');
                }
                jQuery(".countries2").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

}

jQuery(function() {
    var loc = new locationInfo2();
    loc.getCountries();
    jQuery(".countries2").on("change", function(ev) {
        var countryId = jQuery("option:selected", this).attr('countryid2');
        if(countryId != ''){
            loc.getStates(countryId);
        }
        else{
            jQuery(".states2 option:gt(0)").remove();
        }
    });
    jQuery(".states2").on("change", function(ev) {
        var stateId = jQuery("option:selected", this).attr('stateid2');
        if(stateId != ''){
            loc.getCities(stateId);
        }
        else{
            jQuery(".cities2 option:gt(0)").remove();
        }
    });

    jQuery(".cities2").on("change", function(ev) {
        var cityId = jQuery("option:selected", this).val();
        if(cityId != ''){
            loc.confCity(cityId);
        }
    });
});