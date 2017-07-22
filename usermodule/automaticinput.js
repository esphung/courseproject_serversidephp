/*
  ##    ##  ### #### ##  ## ##  ##   ##   ##   #### ## #### ## ##
   ##   ##   ## # ## ## ##   ##  ## ##     ##  # ## ##  ## ##   ##
 ## ##  ##   ##   ##    ##   ## # ### #  ## ##   ##     ## ##
 ##  ## ##   ##   ##    ##   ## ## # ##  ##  ##  ##     ## ##
 ## ### ##   ##   ##    ##   ## ##   ##  ## ###  ##     ## ##
 ##  ## ##   ##   ##    ##   ## ##   ##  ##  ##  ##     ## ##   ##
###  ##  ## ##   ####    ## ##  ##   ## ###  ## ####   #### ## ##

*/

// A $( document ).ready() block.
$( document ).ready(function() {
    /*Automatically Format User Input*/

    /*stored vars*/
    var $form = $("#form");
    var $input = $form.find(".autoinput");

    /* event function when user keys up */
    $input.on("keyup", function(event) {

        // 1. if user makes a selection within the input
        var selection = window.getSelection().toString();
        if (selection !== '') {
            return;
        }

        // 2. if user presses the arrow keys on the keyboard.
        if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
            return;
        }

        /*Retrieve the value from the input.*/
        var $this = $(this);
        var input = $this.val();

        /*Sanitize the value using RegEx by removing unnecessary characters*/
        /*var input = input.replace(/[\D\s\._\-]+/g, "");// (optional) allow only numbers*/
        var input = input.replace(/[\W\s\._\-]+/g, ''); // allows letters and numbers


        // Add the thousand separator with the toLocaleString() function, then pass the sanitised value back to the input element.
        $this.val(function() {
            return (input === 0) ? "" : input.toLocaleString("en-US");
        });

    }); // end user input processing with jq functions
});// end doc ready