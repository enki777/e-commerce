import axios from 'axios';
import React, { Component, forwardRef } from 'react';
import CategoriesList from './categories/CategoriesList';
import GamesList from './games/GamesList';
import UpcomingMatches from './matches/UpcomingMatches';
import MatchesSearch from './matches/MatchesSearch';


class Index extends Component {
    constructor() {
        super()
        this.state = {
            // pagination: [],
        }
    }

    upcomingMatches() {
        e.preventDefault();
        // $('#currentMatchesLink').css('borderStyle: none');
    }

    componentDidMount() {
        const pagination = this.props.match.params.id
        axios.get('/api/matches/').then(response => {
            this.setState({
                //    pagination: response.data[0]
            })
        })
    }

    render() {
        const { pagination } = this.state
        return (
            <div className='container-fluid'>
                <div className='row justify-content-center'>
                    <div className="col-2 mt-5">
                        <div className="accordion" id="accordionExample">
                            <GamesList />
                            <CategoriesList />
                        </div>
                        <br />
                    </div>
                    <div className='col-8 mt-5'>
                        <div className="card text-center bg-dark border-0">
                            <div className="card-header ">
                                <ul className="nav nav-tabs card-header-tabs">
                                    <li className="nav-item">
                                        <a className="nav-link bg-dark border-dark text-light border-bottom-0 border-left-0" href="/" tabIndex="-1" aria-disabled="true">Current Matches</a>
                                    </li>
                                    <li className="nav-item">
                                        <a href='/matches/upcoming' className='text-decoration-none'>
                                            <button className="nav-link active bg-dark border-primary text-primary border-bottom-0"><span className="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Upcoming Matches</button>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a className="nav-link bg-dark border-dark text-light border-bottom-0 border-left-0" href="/matches/finished" tabIndex="-1" aria-disabled="true">Finished Matches</a>
                                    </li>
                                </ul>
                            </div>
                            <div className="card-body p-0">
                                <UpcomingMatches />
                            </div>
                        </div>
                    </div>
                    <div className="col-2">
                        <MatchesSearch />
                    </div>
                </div>
            </div>
        )
    }
}

export default Index
