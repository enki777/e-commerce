import React, {Component} from 'react';
import axios from 'axios';

export default class User extends Component {
    constructor(props) {
        super(props);
        this.state = {
            // users: [],
        };
    }

    componentDidMount() {
        axios.get('/api/admin').then(res => {
            this.setState({
                // users: res.data['users'],
            });
            console.log(res.data);
        });
    }

    render() {
        return (
            <div className={'card'}>
                <div className={'card-header'}>
                    <h4 className={'card-title'}>Manage Users</h4>
                </div>
                <div className={'card-body'}>
                    Coming soon !
                </div>
            </div>
        );
    }
}
