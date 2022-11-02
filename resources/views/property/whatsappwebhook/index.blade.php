@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Property')
@section('style')
    <div class="main-content">
        <div class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form class="whatsappform" >
                            <div class="card">
                                <div class="card-header"><h3>Send Whatsapp Messages</h3></div>
                                <div class="card-body">
                                    <h3>Header</h3>
                                    <select class="form-select" onchange="toggleHeader()" id="header">
                                        <option value="none">None
                                        <option value="text">Text
                                        <option value="media">Media
                                    </select>
                                    <div class="form-group" id="showTextBar">
                                        <label>Text</label><br>
                                        <input type="text" name="" id="" class="form-control" placeholder="Enter Text" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group" id="showMediaBar">
                                        <h4 class="align-self-center mr-3">Select Only One</h4>
                                        <div class="card mx-2 border-primary" id="cardImage">
                                            <img class="card-img-top" src="holder.js/100px180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Upload Image</h4>
                                                <input type="file" accept="image/*" class="form-control form-control-file" name="image" id="image" placeholder="" aria-describedby="imageHelpId">
                                            </div>
                                        </div>
                                        <div class="card mr-2 border-primary" id="cardVideo">
                                            <img class="card-img-top" src="holder.js/100px180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Upload Video</h4>
                                                <input type="file" accept="video/*" class="form-control form-control-file" name="video" id="video" placeholder="" aria-describedby="videoHelpId">
                                            </div>
                                        </div>
                                        <div class="card mr-2 border-primary" id="cardPdf">
                                            <img class="card-img-top" src="holder.js/100px180/" alt="">
                                            <div class="card-body">
                                                <h4 class="card-title">Upload PDF</h4>
                                                <input type="file" accept="application/pdf" class="form-control form-control-file" name="pdf" id="pdf" placeholder="" aria-describedby="pdfHelpId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h3>Body</h3>
                                        <label for="comment">Message:</label>
                                        <textarea class="form-control" name="message" rows="5" id="message"></textarea>
                                    </div>
                                    <h3>Action</h3>
                                        <select class="form-select" onchange="toggleButtons()" id="buttons">
                                            <option value="none">None
                                            <option value="buttonCallToAction">Call To Action
                                            <option value="buttonCustom">Custom
                                        </select>
                                    <div class="form-group d-flex">
                                        <select class="form-select" id="callToAction" onchange="toggleCallToAction()">
                                            <option value="none">None
                                            <option value="visitWebsite">Visit Website
                                            <option value="toggleCall">Call Phone Number
                                        </select>
                                        <input type="text" name="" id="custom" class="form-control" placeholder="Enter Button Text..." aria-describedby="helpId">
                                        <input type="text" name="" id="website1" class="form-control" placeholder="Enter Button Text..." aria-describedby="helpId">
                                        <input type="email" name="" id="website2" class="form-control" placeholder="Enter Email Address..." aria-describedby="helpId">
                                        <input type="text" name="" id="phoneNumber1" class="form-control" placeholder="Enter Button Text..." aria-describedby="helpId">
                                        <input type=".tel" name="" id="phoneNumber2" class="form-control" placeholder="Enter Number..." aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <a onclick="toggle()" class="btn btn-success text-white mb-3">Select All</a>
                                        <a onclick="cancel()" class="btn btn-secondary text-white mb-3">Cancel</a><br>
                                        <input type="checkbox" value="923154242865" id="number0" name="number">
                                        <label for=".number0"> Client 1</label><br>
                                        <input type="checkbox" value="923154242865" id="number1" name="number">
                                        <label for=".number1"> Client 2</label><br>
                                        <input type="checkbox" value="923208450598" id="number2" name="number">
                                        <label for=".number2"> Client 3</label><br>
                                    </div>
                                    <div class="text-right">
                                        <button onclick="sendWhatsappMessage()" class="btn btn-primary text-right">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function toggle() {
        checkboxes = document.getElementsByName('number');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = true;
        }
    }
    function cancel() {
        checkboxes = document.getElementsByName('number');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = false;
        }
    }


    document.getElementById("showTextBar").style.display = "none";
    document.getElementById("showMediaBar").style.display = "none";
    document.getElementById("image").style.display = "none";
    document.getElementById("video").style.display = "none";
    document.getElementById("pdf").style.display = "none";
    document.getElementById("callToAction").style.display = "none"
    document.getElementById("website1").style.display = "none"
    document.getElementById("website2").style.display = "none"
    document.getElementById("phoneNumber1").style.display = "none"
    document.getElementById("phoneNumber2").style.display = "none"
    document.getElementById("custom").style.display = "none"

    function toggleHeader() {
        var x = document.getElementById("header").value
        if(x == "text"){
            document.getElementById("showTextBar").style.display = "block";
            document.getElementById("showMediaBar").style.display = "none";
        }
        else if(x == "media"){
            document.getElementById("showTextBar").style.display = "none";
            document.getElementById("showMediaBar").style.display = "flex";
        }
        else{
            document.getElementById("showTextBar").style.display = "none";
            document.getElementById("showMediaBar").style.display = "none";
        }
    }

    document.getElementById("cardImage").addEventListener("click", displayImageInput);
    document.getElementById("cardVideo").addEventListener("click", displayVideoInput);
    document.getElementById("cardPdf").addEventListener("click", displayPdfInput);

    function displayImageInput(){
        document.getElementById("image").style.display = "block"
        document.getElementById("cardVideo").style.display = "none"
        document.getElementById("cardPdf").style.display = "none"
    }
    function displayVideoInput(){
        document.getElementById("video").style.display = "block"
        document.getElementById("cardPdf").style.display = "none"
        document.getElementById("cardImage").style.display = "none"
    }
    function displayPdfInput(){
        document.getElementById("pdf").style.display = "block"
        document.getElementById("cardImage").style.display = "none"
        document.getElementById("cardVideo").style.display = "none"
    }

    function toggleButtons(){
        var y = document.getElementById("buttons").value
        if(y == "buttonCallToAction"){
            document.getElementById("callToAction").style.display = "block"
            document.getElementById("custom").style.display = "none"
        }
        else if(y == "buttonCustom"){
            document.getElementById("custom").style.display = "block"
            document.getElementById("callToAction").style.display = "none"
        }
        else{
            document.getElementById("callToAction").style.display = "none"
            document.getElementById("custom").style.display = "none"
            document.getElementById("website1").style.display = "none"
            document.getElementById("website2").style.display = "none"
            document.getElementById("phoneNumber1").style.display = "none"
            document.getElementById("phoneNumber2").style.display = "none"
        }
    }

    function toggleCallToAction(){
        var z = document.getElementById("callToAction").value
            if(z == "visitWebsite"){
                document.getElementById("website1").style.display = "block"
                document.getElementById("website2").style.display = "block"
                document.getElementById("phoneNumber1").style.display = "none"
                document.getElementById("phoneNumber2").style.display = "none"
            }
            else if(z == "toggleCall"){
                document.getElementById("website1").style.display = "none"
                document.getElementById("website2").style.display = "none"
                document.getElementById("phoneNumber1").style.display = "block"
                document.getElementById("phoneNumber2").style.display = "block"
            }
            else {
                document.getElementById("website1").style.display = "none"
                document.getElementById("website2").style.display = "none"
                document.getElementById("phoneNumber1").style.display = "none"
                document.getElementById("phoneNumber2").style.display = "none"
            }
    }

    function sendWhatsappMessage(){
        const numbersArray = []
        for(var i = 0; i < 3; i++){
            if (document.getElementById(('number')+i).checked){
                const number= document.getElementById(('number')+i).value
                numbersArray.push(number)
            }
        }
        numbersArray.join('')
        numbersArray.forEach(number => {
            const data = {messaging_product: "whatsapp", to: number, type: "template", template: {
                name: "hello_world",
                language: { code: "en_US" },
                components: [
                    {
                        type: "header",
                        parameters: [
                            {
                                type: "image",
                                image: {
                                    link: "https://upload.wikimedia.org/wikipedia/commons/b/b6/Image_created_with_a_mobile_phone.png"
                                }
                            },
                            {
                                type: "video",
                                video: {
                                id: "your-media-id"
                                }
                            },
                            {
                                type: "document",
                                document: {
                                    link: "the-provider-name/protocol://the-url",
                                }
                            },
                            {
                                type: "text",
                                text: "text"
                            }
                        ]
                    },
                    {
                        type: "body",
                        parameters: [
                            {
                                type: "text",
                                text: "Hello"
                            }
                        ]
                    },
                    {
                        type: "button",
                        sub_type : "quick_reply",
                        index: "0",
                        parameters: [
                            {
                                type: "payload",
                                payload:"aGlzIHRoaXMgaXMgY29vZHNhc2phZHdpcXdlMGZoIGFTIEZISUQgV1FEV0RT"
                            }
                        ]
                    },
                    {
                        type: "button",
                        sub_type : "url",
                        index: "1",
                        parameters: [
                            {
                                type: "text",
                                text: "9rwnB8RbYmPF5t2Mn09x4h"
                            }
                        ]
                    },
                ],
            }};

            fetch("https://graph.facebook.com/v14.0/113096301584384/messages", {
            method: "POST",
            headers: {'Content-Type': 'application/json',
                        'Authorization': ' Bearer EAAK0F3FROZCQBAJPHUkfuUxclHQb6meizbqpB3yUnVYT8I1Wi8DCRVZC7bXTZAtfxmudwK9LVYwxZCKtGQvfx4OX5cV7RPLF5X9ybpiheziZAYLRYPUnjZBTuxAilx7S7h1nA9cYBk4QlGm9PgPL7ZBSFBRHqZBnKYt2d250ZB84lc8espA4uuUaTxZADWzPbmFdFzLNXbjbr7qgZDZD'},
            body: JSON.stringify(data)
            })
            .then(res => {
            ("Request complete! response:", res);
            });
        });

    }



</script>
@endsection
