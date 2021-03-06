{extends file=$render->getLayoutPath('Page/Abstract/default.tpl')}

{block name='content-main'}
  {component name='Admin_Component_Filter_Search' searchTerm=$searchTerm urlPage='Admin_Page_Events'}
  {if isset($searchTerm)}
    <h2>{translate 'Veranstaltungen für "{$searchTerm}"' searchTerm="<span class=\"searchTerm\">{$searchTerm|escape}</span>"}</h2>
    {component name='Admin_Component_EventList_Search' text=$searchTerm}
  {else}
    <h2>{translate 'Veranstaltungen vom {$date}' date="<time class=\"currentDate\"><span class=\"weekday\">{date_weekday date=$date}</span>{date time=$date->getTimestamp()}</time>"}</h2>
    {menu name='weekdays' template='weekdays' class="clearfix"}
    <div class="columns">
      <div class="column2">
        <h2>{translate 'Veranstaltungen'}</h2>
        {component name='Admin_Component_EventList_DateTime' date=$date count=50}
      </div>
      <div class="column2">
        {component name='Admin_Component_EventList_Queued' date=$date}
        {component name='Admin_Component_VenueList_Queued' date=$date}
      </div>
    </div>
  {/if}
{/block}
