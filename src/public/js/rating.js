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
        this.rate.addEventListener("click", this.starRate.bind(this));
        this.ratingForm.addEventListener("submit", this.formRate.bind(this));
    }
    
    starRate()
    {
        if(this.rate.hasClass('star-grey'))
        {
            this.rate.removeClass('star-grey').addClass('star-highlight star-selected');
            this.rate.prevAll(this.rate).removeClass('star-grey').addClass('star-highlight star-selected');
            this.rate.nextAll(this.rate).removeClass('star-highlight star-selected').addClass('star-grey');
        }
        else
        {
            this.rate.nextAll(this.rate).removeClass('star-highlight star-selected').addClass('star-grey');
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

  