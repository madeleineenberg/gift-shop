import React, { useContext, useEffect } from 'react';
import { PersonContext } from '../contexts/PersonContext';
import { useHistory } from 'react-router-dom';

export default function AgePage() {
  const { setPersonList, personList, correctStarted } =
    useContext(PersonContext);
  const history = useHistory();

  useEffect(() => {
    if (!correctStarted) {
      history.push('/');
    }
  }, []);

  const handleOnSubmit = (e) => {
    e.preventDefault();
    if (document.querySelector('input[name=age]:checked')) {
      history.push('/interest');
    } else {
      return;
    }
    console.log(personList);
  };

  return (
    <div className='app-container'>
      <h2 className='subtitle'>Select Age</h2>
      <form onSubmit={handleOnSubmit}>
        <div>
          <input
            type='radio'
            name='age'
            value='a'
            onChange={(e) => setPersonList(e.target.value)}
          />
          <label>Under 25 👶</label>
        </div>
        <div>
          <input
            type='radio'
            name='age'
            value='b'
            onChange={(e) => setPersonList(e.target.value)}
          />
          <label>Over 25 under 50 🤷🏻‍♀️ </label>
        </div>
        <div>
          <input
            type='radio'
            name='age'
            value='c'
            onChange={(e) => setPersonList(e.target.value)}
          />
          <label>Over 50 👵🏻 </label>
        </div>
        <button type='submit'>Next</button>
      </form>
    </div>
  );
}
