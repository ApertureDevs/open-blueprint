import { Injectable } from '@angular/core';
import { Blueprint } from '@model/domain/blueprint/blueprint';
import { Difficulty } from '@model/domain/blueprint/difficulty';
import { Skill } from '@model/domain/blueprint/skill';
import { Type } from '@model/domain/component/type';
import { Grant } from '@model/domain/team/grant';
import { MemberStatus } from '@model/domain/team/member-status';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class BlueprintService {

  private blueprints: Blueprint[] = [
    {
      id: 'b49ba048-6151-4885-9b25-2cfeec6e7378',
      name: 'itoaster',
      tags: [
        'kitchen',
        'cooking',
        'breakfast',
      ],
      difficulty: Difficulty.Hard,
      thumbnail: 'http://placehold.it/250x150',
      isOfficial: true,
      favoritesCount: 83,
      shortDescription: 'An intelligent toaster',
      longDescription: 'An intelligent toaster to toast things.',
      forkFrom: {
        id: '731a1e20-dcb7-45a4-87ef-29a81c164845',
        name: 'simple toaster',
        tags: [
          'kitchen',
          'cooking',
          'breakfast',
        ],
        difficulty: Difficulty.Medium,
        thumbnail: 'http://placehold.it/250x150',
        isOfficial: true,
        favoritesCount: 83,
        shortDescription: 'A simple toaster',
        longDescription: 'A simple toaster to toast things.',
        forkFrom: null,
        forksCount: 1,
        openIssuesCount: 0,
        releases: [
          {
            id: '29c7fd57-89cf-4638-9eea-6a5ace4cd1ad',
            changelog: null,
            tag: '1.0.1',
            date: new Date('12-02-2020'),
            requirements: {
              skills: [
                Skill.Electronic,
                Skill.Print,
              ],
              components: [
                {
                  quantity: 9,
                  component: {
                    id: 'fdf7e4d5-32fd-4503-bfb0-f72c5f70add6',
                    reference: 'ref-resistor-10',
                    type: Type.Electronic,
                    description: '10 ohm electronic resistor',
                  },
                },
                {
                  quantity: 2,
                  component: {
                    id: '38499ea2-4640-465d-af7d-b376190082b6',
                    reference: 'ref-transistor-10',
                    type: Type.Electronic,
                    description: 'electronic transistor NPN 60v 5A 2W',
                  },
                },
              ],
            },
            size: {
              length: 3000,
              width: 1000,
              height: 2000,
            },
            photos: [
              'http://placehold.it/250x150',
              'http://placehold.it/250x150',
            ],
          },
          {
            id: '3652ea73-90d4-4a22-b32d-f900eb657d2c',
            changelog: null,
            tag: '1.0.0',
            date: new Date('12-01-2020'),
            requirements: {
              skills: [
                Skill.Electronic,
              ],
              components: [
                {
                  quantity: 5,
                  component: {
                    id: 'fdf7e4d5-32fd-4503-bfb0-f72c5f70add6',
                    reference: 'ref-resistor-10',
                    type: Type.Electronic,
                    description: '10 ohm electronic resistor',
                  },
                },
                {
                  quantity: 1,
                  component: {
                    id: '38499ea2-4640-465d-af7d-b376190082b6',
                    reference: 'ref-transistor-10',
                    type: Type.Electronic,
                    description: 'electronic transistor NPN 60v 5A 2W',
                  },
                },
              ],
            },
            size: {
              length: 3000,
              width: 1000,
              height: 2000,
            },
            photos: [
              'http://placehold.it/250x150',
            ],
          },
        ],
        team: {
          id: 'f7997c40-e48b-4214-a77c-e93850b9001e',
          members: [
            {
              id: 'a9854b6f-df48-4bc5-95ef-e8d2a759b39e',
              invitation: null,
              status: MemberStatus.Enable,
              grants: [
                Grant.GrantManagement,
                Grant.IssueManagement,
                Grant.MemberManagement,
                Grant.ReleaseManagement,
              ],
              user: {
                id: '7c7b0e11-1c1a-4587-83fe-4bd433cf4370',
                username: 'baz',
                avatar: 'http://www.gravatar.com/avatar',
                skills: [
                  Skill.Electronic,
                  Skill.Print,
                ],
              },
            },
          ],
        },
        createDate: new Date('12-01-2020'),
        updateDate: new Date('12-31-2020'),
      },
      forksCount: 10,
      openIssuesCount: 3,
      releases: [
        {
          id: '48306725-e902-4a6e-851f-9d3efc7dee5e',
          changelog: null,
          tag: '1.1.0',
          date: new Date('12-31-2020'),
          requirements: {
            skills: [
              Skill.Electronic,
              Skill.Print,
            ],
            components: [
              {
                quantity: 10,
                component: {
                  id: 'fdf7e4d5-32fd-4503-bfb0-f72c5f70add6',
                  reference: 'ref-resistor-10',
                  type: Type.Electronic,
                  description: '10 ohm electronic resistor',
                },
              },
              {
                quantity: 2,
                component: {
                  id: '38499ea2-4640-465d-af7d-b376190082b6',
                  reference: 'ref-transistor-10',
                  type: Type.Electronic,
                  description: 'electronic transistor NPN 60v 5A 2W',
                },
              },
            ],
          },
          size: {
            length: 2000,
            width: 800,
            height: 1500,
          },
          photos: [
            'http://placehold.it/250x150',
            'http://placehold.it/250x150',
            'http://placehold.it/250x150',
          ],
        },
        {
          id: '29c7fd57-89cf-4638-9eea-6a5ace4cd1ad',
          changelog: null,
          tag: '1.0.1',
          date: new Date('12-02-2020'),
          requirements: {
            skills: [
              Skill.Electronic,
              Skill.Print,
            ],
            components: [
              {
                quantity: 9,
                component: {
                  id: 'fdf7e4d5-32fd-4503-bfb0-f72c5f70add6',
                  reference: 'ref-resistor-10',
                  type: Type.Electronic,
                  description: '10 ohm electronic resistor',
                },
              },
              {
                quantity: 2,
                component: {
                  id: '38499ea2-4640-465d-af7d-b376190082b6',
                  reference: 'ref-transistor-10',
                  type: Type.Electronic,
                  description: 'electronic transistor NPN 60v 5A 2W',
                },
              },
            ],
          },
          size: {
            length: 3000,
            width: 1000,
            height: 2000,
          },
          photos: [
            'http://placehold.it/250x150',
            'http://placehold.it/250x150',
          ],
        },
        {
          id: '3652ea73-90d4-4a22-b32d-f900eb657d2c',
          changelog: null,
          tag: '1.0.0',
          date: new Date('12-01-2020'),
          requirements: {
            skills: [
              Skill.Electronic,
            ],
            components: [
              {
                quantity: 5,
                component: {
                  id: 'fdf7e4d5-32fd-4503-bfb0-f72c5f70add6',
                  reference: 'ref-resistor-10',
                  type: Type.Electronic,
                  description: '10 ohm electronic resistor',
                },
              },
              {
                quantity: 1,
                component: {
                  id: '38499ea2-4640-465d-af7d-b376190082b6',
                  reference: 'ref-transistor-10',
                  type: Type.Electronic,
                  description: 'electronic transistor NPN 60v 5A 2W',
                },
              },
            ],
          },
          size: {
            length: 3000,
            width: 1000,
            height: 2000,
          },
          photos: [
            'http://placehold.it/250x150',
          ],
        },
      ],
      team: {
        id: '67a6cea6-cad7-475b-b257-7d17bb2eed00',
        members: [
          {
            id: '571227e5-8fa2-4706-a589-dfe81320c353',
            invitation: null,
            status: MemberStatus.Enable,
            grants: [
              Grant.GrantManagement,
              Grant.IssueManagement,
              Grant.MemberManagement,
              Grant.ReleaseManagement,
            ],
            user: {
              id: 'f5bb32a4-eb22-47f1-9af4-6bff71fa5bb3',
              username: 'foo',
              avatar: 'http://www.gravatar.com/avatar',
              skills: [
                Skill.Electronic,
                Skill.Print,
              ],
            },
          },
        ],
      },
      createDate: new Date('12-01-2020'),
      updateDate: new Date('12-31-2020'),
    },
    {
      id: '0a0b8f59-1b8c-445b-b6c5-9a7a99376017',
      name: 'pampa',
      tags: [
        'game',
        'cactus',
      ],
      difficulty: Difficulty.Easy,
      thumbnail: 'http://placehold.it/250x150',
      isOfficial: false,
      favoritesCount: 9999,
      shortDescription: 'A Pampa Key Ring',
      longDescription: 'A running pampa 3D schema for your key ring.',
      forkFrom: null,
      forksCount: 0,
      openIssuesCount: 0,
      releases: [
        {
          id: '7f9fcfef-c030-41a6-a2cc-329f169e85e5',
          changelog: null,
          tag: '1.0.0',
          date: new Date('12-01-2020'),
          requirements: {
            skills: [
              Skill.Print,
            ],
            components: [],
          },
          size: {
            length: 10,
            width: 10,
            height: 20,
          },
          photos: [],
        },
      ],
      team: {
        id: '166a2aa5-485c-4dbd-8bde-0f29c374099c',
        members: [
          {
            id: 'd0f17a4f-8fcb-46c9-a662-a4257f138025',
            invitation: null,
            status: MemberStatus.Enable,
            grants: [
              Grant.GrantManagement,
              Grant.IssueManagement,
              Grant.MemberManagement,
              Grant.ReleaseManagement,
            ],
            user: {
              id: '6391c545-a4f1-45f5-ad48-500fa23cd631',
              username: 'bar',
              avatar: 'http://www.gravatar.com/avatar',
              skills: [
                Skill.Print,
              ],
            },
          },
        ],
      },
      createDate: new Date('11-01-2020'),
      updateDate: new Date('11-01-2020'),
    },
  ];

  public getItem(id: string): Observable<Blueprint> {
    // TODO: retrieve real value from api
    return new Observable<Blueprint>((subscriber) => {
      setTimeout(() => {
        const blueprint: Blueprint | undefined = this.blueprints.find((item) => item.id === id);

        if (typeof blueprint === 'undefined') {
          subscriber.error(new Error(`No Blueprint found with id \"${id}\"`))
          subscriber.complete();
        }

        subscriber.next(this.blueprints[0]);
        subscriber.complete();
      }, 1000)
    });
  }

  public getCollection(): Observable<Blueprint[]> {
    // TODO: retrieve real value from api
    return new Observable<Blueprint[]>((subscriber) => {
      setTimeout(() => {
        subscriber.next(this.blueprints);
        subscriber.complete();
      }, 1000)
    });
  }
}
