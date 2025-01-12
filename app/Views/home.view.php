<?php $this->view('header');?>

<div>
    <h1>Home View</h1>
</div>

<section>
    <h2>Arcadia, grand avec un grand G</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint laborum maiores illum dolor, ullam quis veniam quas
        distinctio amet sapiente culpa similique corporis nesciunt sed. Incidunt, pariatur. Laboriosam, vero odio nihil
        voluptas ipsam labore.</p>
</section>

<section>
    <h2>Nos services</h2>
    <ul>
        <li>
            <div>
                <h3>test service title</h3>
                <img src="" alt="image">
                <p>service desc</p>
            </div>
        </li>
    </ul>
</section>

<section>
    <h2>Les avis de nos visiteurs</h2>
    <table id="avis">
        <tr>
            <td>User</td>
            <td>Commentaire</td>
        </tr>
        <tr>
            <td>Marie</td>
            <td>Très bon zoo à visiter</td>
        </tr>
    </table>
</section>

<?php $this->view('footer');?>