import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Home extends Component {
    render() {
        return (
            <div>
                <Banner/>
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-md-8">
                            <div className="card">
                                <div className="card-header">Example Component</div>

                                <div className="card-body">
                                    teste2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

class Banner extends React.Component{
    render() {
        return (
            <section className="intro_section page_mainslider ds all-scr-cover">
                <div className="flexslider vertical-nav" data-dots="true" data-nav="false">
                    <ul className="slides">
                        <li>
                            <div className="slide-image-wrap">
                                <img src="https://via.placeholder.com/1905x905" alt=""/>
                            </div>

                            <div className="slide-image-wrap hidden-xs hidden-sm to_animate" data-animation="fadeInRight">
                                {/*<img src="images/slide01-person.png" alt=""/>*/}
                            </div>

                            <div className="container">
                                <div className="row">
                                    <div className="col-sm-12">
                                        <div className="slide_description_wrapper">
                                            <div className="slide_description">
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <h2>
                                                        <span className="thin">We Bring</span>
                                                        Your Appliance
                                                        <span className="weight-black text-uppercase">back to life</span>
                                                    </h2>
                                                    <hr className="theme-divider big color2"/>
                                                </div>
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <p>Our team of professionals is well versed in the repairs of all major
                                                        and minor home appliances and will repair any malfunction.</p>
                                                </div>
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <div className="slide_buttons">
                                                        <a href="contact.html" className="theme_button color2">book
                                                            online</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li>
                            <div className="slide-image-wrap">
                                <img src="https://via.placeholder.com/1905x905" alt=""/>
                            </div>
                            <div className="slide-image-wrap hidden-xs hidden-sm to_animate" data-animation="fadeInRight">
                                {/*<img src="images/slide02-person.png" alt=""/>*/}
                            </div>
                            <div className="container">
                                <div className="row">
                                    <div className="col-sm-12">
                                        <div className="slide_description_wrapper">
                                            <div className="slide_description">
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <h2>
                                                        <span className="thin">Fast And</span>
                                                        Quality Service
                                                        <span
                                                            className="weight-black text-uppercase">By Professionals</span>
                                                    </h2>

                                                    <hr className="theme-divider big color2"/>
                                                </div>
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <p>Our team of professionals is well versed in the repairs of all major
                                                        and minor home appliances and will repair any malfunction.</p>
                                                </div>
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <div className="slide_buttons">
                                                        <a href="contact.html" className="theme_button color2">book
                                                            online</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                    </ul>
                </div>
            </section>

        );
    }
}

// if (document.getElementById('banner')) {
//     ReactDOM.render(<Banner/>, document.getElementById('banner'));
// }

if (document.getElementById('home')) {
    ReactDOM.render(<Home/>, document.getElementById('home'));
}
