class Service {

    async comment(value, post_id) {
        const url = ''.concat(window.location.origin,'/comment/', post_id);
        let token = document.querySelector('meta[name=csrf-token]').content;
        let jsonBody = JSON.stringify({ 'comment': value, 'post_id': post_id, '_token': token });
        let response = await fetch(url, {
            method: 'POST',
            body: jsonBody,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Content-Type': 'application/json'
            }
        });

        return response.json();

    }

    async like(post_id) {
        const url = ''.concat(window.location.origin,'/comment/', post_id);
        let token = document.querySelector('meta[name=csrf-token]').content;
        let jsonBody = JSON.stringify({ 'post_id': post_id, '_token': token });
        let response = await fetch(url, {
            method: 'POST',
            body: jsonBody,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                'Content-Type': 'application/json'
            }
        });

        return response.json();

    }

}

let service = new Service;

const e = document.createElement.bind(document);

function myComment(post_id) {

    let commentValue = document.getElementById('cmtinput');
    let value = commentValue.value;
    service.comment(value, post_id).then((response) => {
        console.log(response);
    });
}

function like(post_id) {
    service.like(post_id).then((response) => {
        console.log(response);
        let like = document.getElementById('like');
        like.className
    });
}







