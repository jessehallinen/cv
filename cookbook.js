// Bootstrap breakpoints, use like: if(md.matches) {}
var sm = window.matchMedia('(min-width: 575px)');
var md = window.matchMedia('(min-width: 767px)');
var lg = window.matchMedia('(min-width: 991px)');
var xl = window.matchMedia('(min-width: 1200px)');
var currBreakpoint;

function handleWindowResize() {
    let newBreakpoint = sm;
    if(xl.matches) {
        newBreakpoint = xl;
    }
    else if(lg.matches) {
        newBreakpoint = lg;
    }
    else if(md.matches) {
        newBreakpoint = md;
    }

    // If breakpoint changed.
    if(currBreakpoint != newBreakpoint) {
        currBreakpoint = newBreakpoint;
        clearRecipes();
        createRecipeCards();
    }
}

function showRecipeEdit(recipeId) {
    // If logged in.
    if(loggedIn) {
        // If editing old recipe then fill in the fields.
        if(typeof recipeId !== 'undefined') {
            let recipe;
            
            // Find recipe with the given id.
            $.each(recipes, function(k, r) {
                if(r['id'] == recipeId) {
                    recipe = r;
                    return false;
                }
            });
            
            $('#recipe-id').val(recipeId);
            $('#recipe-img-preview').prop('src', 'images/img_' + recipeId + '.jpg').show();
            $('#recipe-name').val(recipe['name']);
            $('#recipe-desc').val(recipe['description']);
            $('#recipe-inst').val(recipe['instructions']);
            
            // Remove old ingredient rows.
            $('#ingr-list').empty();

            // Split ingredients string into an array.
            let ingrArray = recipe['ingredients'].split('|');
            let arrLength = ingrArray.length;
            for(let i = 0; i < arrLength; i++) {
                ingr = ingrArray[i].split('_');
                addNewIngredient(ingr[0], ingr[1], ingr[2]);
            }
        }
        else {
            $('#recipe-id').val('');
            $('#recipe-img-preview').hide();
            $('#recipe-name').val('');
            $('#recipe-desc').val('');
            $('#recipe-inst').val('');
        }

        $("#new-recipe-bg").show();
        $("#new-recipe").show();
        // prevent scrolling the site when the new recipe box is open
        $("body").css("overflow", "hidden");
    }
    // Else not logged in so alert the user.
    else {
        alert("Kirjaudu sisään muokataksesi tai lisätäksesi uusia reseptejä.");
    }
}

// Show new recipe box.
$("#add-new-recipe").click(function() {
    showRecipeEdit();
});

// Hide new recipe box.
$("#new-recipe-close").click(function() {
    $("#new-recipe-bg").hide();
    $("#new-recipe").hide();
    // allow scrolling
    $("body").css("overflow", "");
});

function addNewIngredient(name, amount, measure) {
    let editing_recipe = typeof name !== 'undefined';
    
    let inputGroup = $('<div class="input-group ingr"></div>');

    let nameInput = $('<input type="text" name="recipe-ingr[]" class="form-control col recipe-ingr" placeholder="Ainesosa" autocomplete="off" maxlength="50" required>');
    inputGroup.append(nameInput);

    let amountInput = $('<input type="number" step="0.01" name="ingr-amount[]" class="form-control col-sm-3 ingr-amount" placeholder="Määrä" required>');
    inputGroup.append(amountInput);

    let select = $('<select class="custom-select col-sm-3 ingr-measure" name="ingr-measure[]"></select>');
    inputGroup.append(select);

    let arrLength = measures.length;
    let measureId;
    for(let i = 0; i < arrLength; i++) {
        select.append('<option value="' + measures[i][0] + '">' + measures[i][1] + '</option>')
        if(editing_recipe && measure == measures[i][1]) {
            measureId = measures[i][0];
        }
    }

    inputGroup.append('<button type="button" class="btn close delete-ingr" aria-label="Delete ingredient">' + 
                            '<span aria-hidden="true">×</span>' +
                        '</button>');
    $("#ingr-list").append(inputGroup);

    initTypeahead();

    // If editing old recipe then fill in the fields.
    if(editing_recipe) {
        nameInput.val(name);
        amountInput.val(amount);
        select.find('option[value="' + measureId + '"]').prop("selected", "selected");
    }
}

$('#ingr-list').on('click', '.delete-ingr', function() {
    // There must be atleast one ingredient.
    if($('#ingr-list').children().length > 1) {
        $(this).parent().remove();
    }
    else {
        alert("Reseptillä pitää olla ainakin yksi ainesosa!");
    }
});

// Add new ingredient row.
$("#add-ingredient").click(function() {
    addNewIngredient();
});

function initTypeahead() {
    $(".recipe-ingr").typeahead({
        source: function(query, result) {
            $.ajax({
                url:"db_functions/fetch.php",
                method:"POST",
                data:{ ingrQuery:query },
                dataType:"json",
                async: true,
                success:function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            });
        }
    });
}

$('#recipes').on('click', '.show-recipe', function() {
    let recId = $(this).data('rec-id');
    $('#recipes a[data-rec-id="' + recId + '"]').removeClass('show-recipe').addClass('hide-recipe').html('Piilota ohje'); //<span class="fa fa-angle-up"></span>');
});

$('#recipes').on('click', '.hide-recipe', function() {
    let recId = $(this).data('rec-id');
    $('#recipes a[data-rec-id="' + recId + '"]').removeClass('hide-recipe').addClass('show-recipe').html('Näytä ohje'); //<span class="fa fa-angle-down"></span>');
});

// Allow only 2 decimals for ingredient amount.
$("#ingr-list").on('input', '.ingr-amount', function () {
    this.value = this.value.match(/^\d+\.?\d{0,2}/);
});

$('#recipe-img').change(function() {
    if($(this).prop('files')[0].size > 1048576 * 0.5){
       alert("Liian suuri kuvatiedosto! Tiedoston maksimikoko 0.5MB.");
       this.value = "";
    };
});

function lineBreaksToBr(str) {
    return str.replace(/(?:\r\n|\r|\n)/g, '<br>');
}

function clearRecipes() {
    $('#recipes').empty();
}

function createRecipeCards() {
    let recipeCnt = recipes.length;
    let recipeContainers = [];
    let colNum = 1;
    
    if(xl.matches) {
        colNum = 4;
    }
    else if(lg.matches) {
        colNum = 3;
    }
    else if(md.matches) {
        colNum = 2;
    }

    for(let i = 0; i < colNum; i++) {
        let tmp = $('<div id="recipes-' + i + '" class="card-columns"></div>');
        $('#recipes').append(tmp);
        recipeContainers.push(tmp);
    }

    let cntr = 0;
    $.each(recipes, function(k, recipe) {
        let elem =    '<div id="recipe-' + recipe['id'] + '" class="card">' +
                        '<img class="card-img-top" src="images/img_' + recipe['id'] + '.jpg" alt="img" onerror="javascript:this.src=\'https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg\'">' +
                        '<div class="card-body">' +
                            '<h4 class="card-title">' +
                                '<a>' + lineBreaksToBr(recipe['name']) + '</a>' +
                                '<button type="button" onClick="showRecipeEdit(' + recipe['id'] + ')" class="btn btn-default">' +
                                    '<span class="fa fa-edit"></span>' +
                                '</button>' +
                            '</h4>' +
                            '<a class="collapsed card-link show-recipe text-center" data-rec-id="' + recipe['id'] + '" data-toggle="collapse" href="#collapse' + cntr + '">' +
                                'Näytä ohje' +
                            '</a>' + 
                            '<div id="collapse' + cntr + '" class="collapse">' +
                                '<div class="recipe-body">' +
                                    '<p class="card-text">' + lineBreaksToBr(recipe['description']) + '</p>' +
                                    '<hr>' +
                                    '<table class="table ingredients">' +
                                        '<tbody>';
        
        // Split ingredients string into an array.
        let ingrArray = recipe['ingredients'].split('|');
        let arrLength = ingrArray.length;
        for(let i = 0; i < arrLength; i++) {
            ingr = ingrArray[i].split('_');
            elem += '<tr class="row">' + 
                        '<td class="text-right text-nowrap col-2" scope="col">' + lineBreaksToBr(ingr[1]) + '</td>' +
                        '<td scope="col" class="text-nowrap col-2">' + ingr[2] + '</td>' +
                        '<td scope="col" class="col-8">' + ingr[0] + '</td>' +
                    '</tr>';
        }

        elem +=                        '</tbody>' +
                                    '</table>' +
                                    '<hr>' +
                                    '<p class="card-text">' + lineBreaksToBr(recipe['instructions']) + '</p>' +
                                    '<a class="collapsed card-link show-recipe text-center" data-rec-id="' + recipe['id'] + '" data-toggle="collapse" href="#collapse' + cntr + '">' +
                                        'Näytä ohje' +
                                    '</a>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
        
        $("#recipes-" + (cntr % colNum)).append(elem);
        cntr += 1;
    });
}


$(document).ready(function() {
    // If screen gets resized
    $(window).resize(function() {
        handleWindowResize();
    });

    createRecipeCards();
    addNewIngredient();
});