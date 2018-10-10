import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Menu extends Component {

    constructor(props) {
        super(props);
        this.state = {
            menu: [
                {
                    name: "Home",
                    link: "/"
                },
                {
                    name: "Quem Somos",
                    link: "/quem-somos"
                },
                {
                    name: "Testes",
                    link: "/testes"
                }
            ]
        }
    }

    testPath(item) {
        var pathname = window.location.pathname;
        return item == pathname ? 'active' : '';
    }

    render(){
        return (

                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 text-center">

                            <nav className="mainmenu_wrapper">

                                <ul className="mainmenu nav sf-menu">
                                    {
                                        this.state.menu.map((item, indice) => {
                                            return (
                                                <li key={indice} className={ this.testPath(item.link) }>
                                                    <a href={item.link}>{item.name}</a>
                                                </li>
                                            )
                                        })
                                    }

                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
        );
    }
}

if(document.getElementById('menu')){
    ReactDOM.render(<Menu/>, document.getElementById('menu'));
}