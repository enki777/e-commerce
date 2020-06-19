import axios from 'axios'
import React, { Component, forwardRef } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'
import CategoriesList from './categories/CategoriesList'
import GamesList from './games/GamesList'
import Matches from './matches/Matches'


class Index extends Component {
    constructor() {
        super()
        this.state = {
            available: [],
            finished: [],
            value: ''
        }
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        this.setState({ value: event.target.value });
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                available: response.data[0],
                finished: response.data[1],
            })
        })
    }

    render() {
        const { available, finished,value } = this.state
        console.log(value)
        return (
            <div className='container-fluid'>
                <div className='row justify-content-center'>
                    <div className="col-2 mt-5">
                        <CategoriesList />
                        <br />
                    </div>
                    <div className='col-8 mt-5'>
                        <div className="card-header bg-dark">
                            <form action={`/matches/search/${value}`} method="get">
                                <input type="text"  value={this.state.value} placeholder="Search matches" onChange={this.handleChange} />
                                <input type="submit" value="Search" />
                            </form>
                        </div>
                        <Matches />
                    </div>
                    <div className="col-2 mt-5">
                        <GamesList />
                    </div>
                </div>
            </div>
        )
    }
}

export default Index