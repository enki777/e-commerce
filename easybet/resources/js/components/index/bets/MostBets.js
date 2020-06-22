import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'

class MostBets extends Component {
    constructor() {
        super()
        this.state = {
            categories: [],
        }
    }

    componentDidMount() {
        axios.get('/api/matches/').then(response => {
            this.setState({
                categories: response.data['categories'],
            })
        })
    }

    render() {
        const categories = this.state.categories
        return (
            <div className="card bg-dark text-white border-success">
                <div className="card-header" id="headingTwo">
                    <h2 className="mb-0">
                        <button className="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span className="text-success text-decoration-none">Most bet on Upcoming matches</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" className="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div className="card-body">
                        {categories.map(category => (
                            <Link
                                className="list-group-item bg-dark text-success text-decoration-none list-unstyled"
                                to={`/matches/category/${category.id}`}
                                key={category.id}
                            >
                                <li key={category.id}>{category.name}</li>
                            </Link>
                        ))}
                    </div>
                </div>
            </div>
        )
    }
}

export default MostBets
