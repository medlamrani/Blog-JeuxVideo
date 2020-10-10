class Rating{

    constructor()
    {
        this.rate = document.getElementsByClassName('rateButton');
        this.ratingForm = document.getElementById('ratingForm');
        this.rating = document.getElementById('rating');
        this.selectedStar = document.getElementsByClassName('star-selected');

        this.ratingEvent();
    }

    ratingEvent()
    {
        
        for(let elt of this.rate )  {
            elt.addEventListener("click", this.starRate.bind(this , elt));
        }; 
        this.ratingForm.addEventListener("submit", this.formRate.bind(this));
    }
    
    starRate(elt, event)
    {
        console.log(elt.classList);
        if(elt.hasClass('star-grey'))
        {
            
            elt.classList.remove('star-grey').classList.add('star-highlight star-selected');
            elt.prevAll(elt).classList.remove('star-grey').classList.add('star-highlight star-selected');
            elt.nextAll(elt).classList.remove('star-highlight star-selected').classList.add('star-grey');
        }
        else
        {
            elt.nextAll(elt).classList.remove('star-highlight star-selected').classList.add('star-grey');
        }
        this.rating.val(this.selectedStar.length);
    }

    formRate(e)
    {
        e.preventDefault();
        let formData = this.ratingForm.serialize();

        $.ajax({
            type : 'POST',
            dataType: 'json',
            url : 'index.php',
            data : formData,
            success:function(response)
            {
                if(response.success == 1)
                {
                    this.ratingForm[0].reset();
                    window.location.reload();
                }
            }
        })
    }
}

  