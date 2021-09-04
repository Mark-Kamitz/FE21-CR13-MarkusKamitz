
# FE21-CR13-MarkusKamitz

![Bildschirmfoto 2021-09-04 um 16 50 22](https://user-images.githubusercontent.com/85449060/132098977-7cc82cdc-eb0e-4dea-ac1b-ab5f95332391.png)

### Project description:

**You will need to implement this project using Symfony!**

* A global event management company needs a web application to track events. They would need to have a list of all their events with the following data:

* Event’s name

* Event’s date and start time

* Event’s description

* Event’s image (link to the image)

* Event’s capacity (number of people)

* Event’s contact e-mail

* Event’s contact phone number

* Event’s address (physical location, including street name and number, ZIP code and city name)

* Event’s URL

* Event’s Type (predefined list like “music”, “sport”, “movie”, “theater” etc.). Note: This is related to the bonus points, not necessary for the basic grading.
 

### For this CodeReview, the following criteria will be graded:

* (20) Create a nice looking responsive theme. You can use Bootstrap or just HTML/CSS. (backenders exempt)

* **Implement an interface for the CRUD on Events:**

* (20) Event index page: all events should be listed here like in the image above (event name, event date and time). Feel free to use Bootstrap cards to display the events.

* (20) Event view page (details page): when a user clicks on the event card/button, an event view page with all the data from that specific event should be displayed.

* (15) Event edit page: on this page, it should be possible to edit the event data.

* (15) Event add/create page: on this page, it should be possible to add a new event.

* (10) Event delete option: a user should be able to delete an event from the database.

**Bonus Points:**

* (20) Create filtering depending on the event type (hint: pass the information to the URL)

**Hint: you could use the method findBy()**

* $repository = $this->getDoctrine()->getRepository(Event::class);

* $events = $repository->findBy(['type' => 'music']);

* This method takes an array as an argument and will return an array with all the results matching the search criteria.
