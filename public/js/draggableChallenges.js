$(document).ready(function() {
    setup();
});


function setup(){
    const sortableList = document.getElementById('draggable-list')
    
    const initSortableList = (e) => {
        e.preventDefault();
        const draggingItem = sortableList.querySelector('tr[data-state="dragging"]')
        const siblings = [...sortableList.querySelectorAll('tr[data-state="static"]')];
        
        let nextSibling = siblings.find(sibling => {
            let siblingDifficulty = sibling.getAttribute('data-difficulty');
            let draggingDifficulty = draggingItem.getAttribute('data-difficulty');
            let siblingClientRect = sibling.getBoundingClientRect();
            let siblingItemY = siblingClientRect.top + siblingClientRect.height / 2;

            if (siblingDifficulty === draggingDifficulty) {
                return e.clientY < siblingItemY;
            } else {
                if(siblingDifficulty < draggingDifficulty){
                    return true;
                } else {
                    return null;
                }
            }
        });
        if(nextSibling != null){
            sortableList.insertBefore(draggingItem, nextSibling);
        }
    }

    sortableList.addEventListener('dragover', initSortableList);
    sortableList.addEventListener('dragenter', e => e.preventDefault());
    
    draggableItems = document.querySelectorAll('tr[draggable="true"]');
    draggableItems.forEach(item => {
        item.addEventListener('dragstart', function(){
            setTimeout(() => item.setAttribute('data-state', 'dragging'), 0);
        });
        item.addEventListener('dragend', function(){
            item.setAttribute('data-state', 'static');

            const race = document.getElementById('race-id');
            const raceId = race.getAttribute('data-race');
            const url = race.getAttribute('data-url');
            const token = document.querySelector('input[name="_token"]').getAttribute('value');

            let positions = [];
            draggableItems = document.querySelectorAll('tr[draggable="true"]');
            draggableItems.forEach((item, index) => {
                positions.push({
                    id: item.getAttribute('data-id'),
                    position: index
                });
            });
            
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: token,
                    positions: positions,
                    raceid: raceId
                },
                success: function(response) {
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
}