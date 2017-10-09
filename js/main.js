jQuery(document).ready(function() {
	function AfficherForm(id){
		if (id=='classement')
		{
			jQuery('.val_type_form').css("display","block");
			jQuery('.rech_cach').hide();
		}
		else
		{
			jQuery('.rech_cach').css("display","block");
			jQuery('.val_type_form').hide();
		}
	};
	jQuery('.real').click(function(){AfficherForm('realisateur')})
	jQuery('.classm').click(function(){AfficherForm('classement')})
	jQuery('.acteur').click(function(){AfficherForm('acteur')})
});




