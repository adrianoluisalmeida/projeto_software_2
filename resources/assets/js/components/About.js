import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class About extends Component{
    render(){
        return (
            <section className="page_breadcrumbs ds background_cover overlay_color section_padding_top_75 section_padding_bottom_65">
                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 text-center">
                            <h2>About Us</h2>
                            <ol className="breadcrumb greylinks">
                                <li> <a href="./">
                                    Home
                                </a> </li>
                                <li> <a href="#">Pages</a> </li>
                                <li className="active">About Us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}

if(document.getElementById('about')){
    ReactDOM.render(<About/>, document.getElementById('about'))
}