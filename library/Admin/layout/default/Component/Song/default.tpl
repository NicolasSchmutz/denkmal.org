<div class="song-content toggleNext">
  {$song->getLabel()|escape}
</div>
<div class="song-edit toggleNext-content">
  {form name='Admin_Form_Song' song=$song}
    {formField name='label' label={translate 'Name'}}

    {formAction action='Save' label={translate 'Speichern'} alternatives="
			{button action='Delete' label={translate 'Löschen'} icon='delete' iconConfirm='delete-confirm' class='warning deleteAffiliate' data=['click-confirmed' => true]}

		"}
  {/form}
</div>
