class menumain extends HTMLElement{
    constructor(){
        super();
    }

    connectedCallback(){
        this.innerHTML = `
        <header>
            <nav id="menu_top">
                <ul>
                    <li><a href="../app/usuarios.php">USUARIOS</a></li>
                    <li><a href="../app/contratos.php">CONTRATOS</a></li>
                    <li><a href="../app/obligaciones.php">OBLIGACIONES</a></li>
                    <li><a href="../app/contratantes.php">CONTRATANTES</a></li>
                    <li><a href="../db/logout.php">SALIR</a></li>
                </ul>
            </nav>        
        </header>
        `;
    }
}

window.customElements.define("menu-main", menumain);