CKEDITOR.plugins.add( 'anahtar',
{
    init: function( editor )
    {
        editor.addCommand( 'insertTimestamp',
            {
                exec : function( editor )
                {  

					function Turkce_cevir(cevir) {
				      cevir = cevir.replace(/\u00c2/g, 'A'); // Â
				      cevir = cevir.replace(/\u00e2/g, 'a'); // â
				      cevir = cevir.replace(/\u00fb/g, 'u'); // û
				      cevir = cevir.replace(/\u00c7/g, 'C'); // Ç
				      cevir = cevir.replace(/\u00e7/g, 'c'); // ç
				      cevir = cevir.replace(/\u011e/g, 'G'); // Ğ
				      cevir = cevir.replace(/\u011f/g, 'g'); // ğ
				      cevir = cevir.replace(/\u0130/g, 'I'); // İ
				      cevir = cevir.replace(/\u0131/g, 'i'); // ı
				      cevir = cevir.replace(/\u015e/g, 'S'); // Ş
				      cevir = cevir.replace(/\u015f/g, 's'); // ş
				      cevir = cevir.replace(/\u00d6/g, 'O'); // Ö
				      cevir = cevir.replace(/\u00f6/g, 'o'); // ö
				      cevir = cevir.replace(/\u00dc/g, 'U'); //Ü
				      cevir = cevir.replace(/\u00fc/g, 'u'); // ü
				      
				      return cevir;   
				    }
				
					var veri_al = editor.getSelection().getNative();
					
					veri_al = Turkce_cevir(String(veri_al)).toLowerCase();

					if (veri_al.length > 50)
					{
						alert("Seçilen karakter sayısı: " + veri_al.length + "\nSeçilen anahtar kelime çok uzun, 50 karakterden az seçim yapınız!")
					}
					else if (veri_al.length == 0)
					{
						alert("Lütfen anahtar kelime seçiniz!");
					}
					else
					{
						var div = document.getElementById(editor.name.substring(0, editor.name.lastIndexOf("-"))+'-keywords');
						div.value = div.value + String(veri_al).trim() + ", ";
					}

                }
            });
			
        editor.ui.addButton( 'anahtar',
        {
            label: 'Anahtar Kelime Ekle',
            command: 'insertTimestamp',
            icon: this.path + 'Images/anahtar.png',
            title: 'Anahtar Kelime Ekle'
        } );
    }
} );